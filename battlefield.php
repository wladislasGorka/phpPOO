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

        $currentLvl=0;
        $currentBreach=4;
        if(isset($_SESSION["currentLvl"])){
            $currentLvl=$_SESSION["currentLvl"];
        }
        if(isset($_SESSION["currentBreach"])){
            $currentBreach=$_SESSION["currentBreach"];
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
                    <li><?php echo $_SESSION['mobs'][$currentLvl]->getHealth(); ?></li>
                    <li><?php echo $_SESSION['mobs'][$currentLvl]->getArmor(); ?></li>
                    <li><?php echo $_SESSION['mobs'][$currentLvl]->getDamage(); ?></li>
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
                echo    "<li>Health: ".$_SESSION['characters'][$i]->getHealth()."</li>";
                echo    "<li>Armor: ".$_SESSION['characters'][$i]->getArmor()."</li>";
                echo    "<li>Level: ".$_SESSION['characters'][$i]->getLevel()."</li>";
                echo "</ul>";
                echo "</section>";
            }
            ?>
        </div>
    </main>
</body>
</html>