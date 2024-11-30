<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel='stylesheet'> 
    <title>php - POO</title>
</head>
<body>
    <?php 
        include("./autoloader.php");

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
        <form method='POST' name='charatersCreation' action=gameInit.php>
            <div class='charactersContainer'>
                <?php
                    for($i=1;$i<5;$i++){
                    echo "<section class='character'>";
                    echo "<h2>Character $i</h2>";
                    echo "<label for='characterName$i'>Name: </label>";
                    echo "<input type='text' name='characterName$i' id='characterName$i'>";
                    echo "<ul>";
                    echo "<li>";
                    echo "<label for='characterRace$i'>Race: </label>";
                    echo "<select name='characterRace$i' id='characterRace$i'>";
                    foreach( $races as $race){
                        echo "<option value=$race>$race</option>";
                    }
                    echo "</select>";
                    echo "</li>";
                    echo "<li>";
                    echo "<label for='characterTalent$i'>Talent: </label>";
                    echo "<select name='characterTalent$i' id='characterTalent$i'>";
                    foreach( $talents as $talent){
                        echo "<option value=$talent>$talent</option>";
                    }
                    echo "</select>";
                    echo "</li>";
                    echo "</ul>";

                    // <ul>
                    //     <li>Race
                    //         <ul>
                    //             <li>Skill 1:</li>
                    //             <li>Description du skill 1</li>
                    //             <li>Skill 2:</li>
                    //             <li>Description du skill 2</li>
                    //         </ul>
                    //     </li>
                    //     <li>Talent
                    //         <ul>
                    //             <li>Skill 4:</li>
                    //             <li>Description du skill 4</li>
                    //             <li>Skill 5:</li>
                    //             <li>Description du skill 5</li>
                    //         </ul>
                    //     </li>
                    // </ul>
                    echo "</section>";
                    }
                ?>
            </div>

            <input type='submit' value='START' class='btn btn-start'>
        </form>
        
    </main>
</body>
</html>