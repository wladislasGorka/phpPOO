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
            header('Location: index.php');
        }
        $currentLvl = $_SESSION['level'];
        if($currentLvl== 5){
            header('Location: index.php');
        }
        


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
                    <li>4 : <?php echo $_SESSION['breach'] == 4 ? "X" : " "; ?></li>
                    <li>3 : <?php echo $_SESSION['breach'] == 3 ? "X" : " "; ?></li>
                    <li>2 : <?php echo $_SESSION['breach'] == 2 ? "X" : " "; ?></li>
                    <li>1 : <?php echo $_SESSION['breach'] == 1 ? "X" : " "; ?></li>
                    <li>0 : <?php echo $_SESSION['breach'] == 0 ? "X" : " "; ?></li>
                </ul>
            </section>
            <section class='combatInfo'>
            <h2>Peril</h2>
                <ul>
                    <li><?php echo $_SESSION['characters'][0]->getName()." : ".$_SESSION['characters'][0]->getPeril() ?></li>
                    <li><?php echo $_SESSION['characters'][1]->getName()." : ".$_SESSION['characters'][1]->getPeril() ?></li>
                    <li><?php echo $_SESSION['characters'][2]->getName()." : ".$_SESSION['characters'][2]->getPeril() ?></li>
                    <li><?php echo $_SESSION['characters'][3]->getName()." : ".$_SESSION['characters'][3]->getPeril() ?></li>
                </ul>
            </section>
        </div>
    
        <div class='charactersContainer'>
            <?php for ($i=0; $i < count($_SESSION['characters']); $i++): ?>
                <section class='character'>
                    <h2><?php echo $_SESSION['characters'][$i]->getName() ?></h2>
                    <ul class='stats'>
                        <li>Health: <?php echo $_SESSION['characters'][$i]->getHealth() . " / " . $_SESSION['characters'][$i]->getMaxHealth() ?></li>
                        <li>Armor: <?php echo $_SESSION['characters'][$i]->getArmor() ?></li>
                        <li>Level: <?php echo $_SESSION['characters'][$i]->getLevel() ?></li>
                    </ul>
                    <ul class='skills'>
                        <?php for($j=0; $j < count($_SESSION['characters'][$i]->getCharacterSkills()); $j++): ?>
                            <li class='item'>
                                <h4><?php echo $_SESSION['characters'][$i]->getCharacterSkills()[$j]->getName() ?></h4>
                                <p><?php echo $_SESSION['characters'][$i]->getCharacterSkills()[$j]->getDescription() ?></p>
                                <form method='POST' name='usedAction' action='usedAction.php'>
                                    <input type='hidden' name='usedCharacter' value=<?php echo $_SESSION['characters'][$i]->getName()?>>
                                    <input type='hidden' name='usedSkill' value=<?php echo $_SESSION['characters'][$i]->getCharacterSkills()[$j]->getName()?>>
                                    <?php
                                    // input target en fonction du type de skill
                                    $type = $_SESSION['characters'][$i]->getCharacterSkills()[$j]->getType();
                                    switch ($type) {
                                        case 'Mob':
                                            $targets=[$_SESSION['mobs'][$currentLvl]];
                                            echo "<input type='hidden' name='targets' value='".$targets[0]->getName()."'>";
                                            break;
                                        case 'Self':
                                            $targets=[$_SESSION['characters'][$i]];
                                            echo "<input type='hidden' name='targets' value='".$targets[0]->getName()."'>";
                                            break;
                                        case 'All':
                                            $targets=[$_SESSION['characters'][0],$_SESSION['characters'][1],$_SESSION['characters'][2],$_SESSION['characters'][3]];
                                            echo "<input type='hidden' name='targets' value='".$targets[0]->getName()."'>";
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
                                    ?>
                                    <input type='submit' value='Use'>
                                </form>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </section>
            <?php endfor; ?>
        </div>
    </main>
</body>
</html>