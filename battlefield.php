<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="battlefield.css" rel='stylesheet'> 
    <title>Battlefield</title>
</head>
<body>
    <?php 
        include("./autoloader.php");
        session_start();

        $currentBreach = $_SESSION['breach'];
        if($currentBreach==0){
            $_SESSION['breach'] = 4;
            $_SESSION['level']++;
        }
        $currentLvl = $_SESSION['level'];
        


        //récupérer les noms de classe pour Race et Talent afin de créer les options des éléments select
        foreach (new DirectoryIterator('./Application/Race') as $fileInfo) {
            if($fileInfo->isDot()) continue;
            $races[] = $fileInfo->getBasename('.php');
        }
        foreach (new DirectoryIterator('./Application/Talent') as $fileInfo) {
            if($fileInfo->isDot()) continue;
            $talents[] = $fileInfo->getBasename('.php');
        }
    ?>
    <header>
        <h1>Dungeon Trials</h1>
    </header>
    <main>
        <div class='combatInfoContainer'>
            <section class='combatInfo'>
                <h2><?php echo $_SESSION['mobs'][$currentLvl]->getName(); ?></h2>
                <ul>
                    <li><?php echo "Health: ".$_SESSION['mobs'][$currentLvl]->getHealth()." / ".$_SESSION['mobs'][$currentLvl]->getMaxHealth(); ?></li>
                    <li><?php echo "Armor: ".$_SESSION['mobs'][$currentLvl]->getArmor(); ?></li>
                    <li><?php echo "Attack: ".$_SESSION['mobs'][$currentLvl]->getDamage(); ?></li>
                </ul>
            </section>
            <section class='combatInfo'>
                <h2>Breach</h2>
                <ul>
                    <li>5</li>
                    <li>4</li>
                    <li>3</li>
                    <li>2</li>
                    <li>1</li>
                    <li>0</li>
                </ul>
            </section>
            <section class='combatInfo'>
            <h2>Peril</h2>
                <ul>
                    <li>4</li>
                    <li>3</li>
                    <li>2</li>
                    <li>1</li>
                    <li>0</li>
                </ul>
            </section>
        </div>
        <div class='charactersContainer'>
            <?php
            for ($i=0; $i < count($_SESSION['characters']); $i++) {
                echo "<section class='character'>";
                echo    "<h2>".$_SESSION['characters'][$i]->getName()."</h2>";
                echo "<ul class='stats'>";
                echo    "<li>Health: ".$_SESSION['characters'][$i]->getHealth()." / ".$_SESSION['characters'][$i]->getMaxHealth()."</li>";
                echo    "<li>Armor: ".$_SESSION['characters'][$i]->getArmor()."</li>";
                echo    "<li>Level: ".$_SESSION['characters'][$i]->getLevel()."</li>";
                echo "</ul>";
                echo "<ul class='skills'>";
                for($j=0; $j < count($_SESSION['characters'][$i]->getCharacterSkills()); $j++){
                    echo    "<li class='item'>
                                <h4>".$_SESSION['characters'][$i]->getCharacterSkills()[$j]->getName()."</h4>
                                <p>".$_SESSION['characters'][$i]->getCharacterSkills()[$j]->getDescription()."</p>
                                <form method='POST' name='usedAction' action='usedAction.php'>
                                    <input type='hidden' name='usedCharacter' value='".$_SESSION['characters'][$i]->getName()."'>
                                    <input type='hidden' name='usedSkill' value='".$_SESSION['characters'][$i]->getCharacterSkills()[$j]->getName()."'>";
                                    // input target en fonction du type de skill
                                    $type = $_SESSION['characters'][$i]->getCharacterSkills()[$j]->getType();
                                    switch ($type) {
                                        case 'Mob':
                                            $targets=[$_SESSION['mobs'][$currentLvl]];
                                            echo "<input type='hidden' name='targets' value='".$targets[0]->getName()."'>";
                                            break;
                                        case 'Self':
                                            $targets=[$_SESSION['characters'][$i]];
                                            echo "<input type='hidden' name='targets' value='".$targets->getName()."'>";
                                            break;
                                        case 'All':
                                            $targets=[$_SESSION['characters'][0],$_SESSION['characters'][1],$_SESSION['characters'][2],$_SESSION['characters'][3]];
                                            echo "<input type='hidden' name='targets' value='".$targets->getName()."'>";
                                            break;
                                        case 'Ally':
                                            echo "<select name='targets'>";
                                            foreach($_SESSION['characters'] as $targets){
                                                if($targets->getName() != $_SESSION['characters'][$i]->getName()){
                                                    echo "<option value='".$targets->getName()."'>".$targets->getName()."</option>";
                                                }
                                            }
                                            echo "</select>";
                                            break;
                                    }
                    echo            "<input type='submit' value='Use'>
                                </form>
                            </li>";
                }
                echo "</ul>";
                echo "</section>";
            }
            ?>
        </div>
    </main>
</body>
</html>