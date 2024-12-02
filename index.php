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
        session_start();

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
        <?php
            if(isset($_SESSION['breach']) && $_SESSION['breach'] == 0){
                echo '<h3>Perdu! Retentez votre chance avec une nouvelle composition d\'équipe.</h3>';
            }
            if(isset($_SESSION['level']) && $_SESSION['level'] == 5){
                echo '<h3>Bravo vous avez triomphé! Retentez votre chance avec une nouvelle composition d\'équipe.</h3>';
            }
        ?>
        <form method='POST' name='charatersCreation' action=gameInit.php>
            <div class='charactersContainer'>
                <?php
                    for($i=1;$i<5;$i++){
                    echo "<section class='character'>";
                    echo "<h2>Character $i</h2>";
                    echo "<label for='characterName$i'>Name: </label>";
                    echo "<input type='text' name='characterName$i' id='characterName$i' required>";
                    echo "<ul>";
                    echo "<li>";
                    echo "<label for='characterRace$i'>Race: </label>";
                    echo "<select name='characterRace$i' id='characterRace$i' onChange='updateInfoRace(characterRace$i,$i)'>";
                    foreach( $races as $race){
                        echo "<option value=$race>$race</option>";
                    }
                    echo "</select>";
                    echo "</li>";
                    echo "<li>";
                    echo "<label for='characterTalent$i'>Talent: </label>";
                    echo "<select name='characterTalent$i' id='characterTalent$i' onChange='updateInfoTalent(characterTalent$i,$i)'>";
                    foreach( $talents as $talent){
                        echo "<option value=$talent>$talent</option>";
                    }
                    echo "</select>";
                    echo "</li>";
                    echo "</ul>";

                    echo "<ul class='infos'>";
                    echo     "<li>Race";
                    echo         "<ul>";
                    echo             "<li id='".$i."raceSkill1Name'>Skill 1:</li>";
                    echo             "<li id='".$i."raceSkill1Description'>Description du skill 1</li>";
                    echo             "<li id='".$i."raceSkill2Name'>Skill 2:</li>";
                    echo             "<li id='".$i."raceSkill2Description'>Description du skill 2</li>";
                    echo         "</ul>";
                    echo     "</li>";
                    echo     "<li>Talent";
                    echo         "<ul>";
                    echo             "<li id='".$i."talentSkill1Name'>Skill 4:</li>";
                    echo             "<li id='".$i."talentSkill1Description'>Description du skill 4</li>";
                    echo             "<li id='".$i."talentSkill2Name'>Skill 5:</li>";
                    echo             "<li id='".$i."talentSkill2Description'>Description du skill 5</li>";
                    echo         "</ul>";
                    echo     "</li>";
                    echo "</ul>";
                    echo "</section>";
                    }
                ?>
            </div>

            <input type='submit' value='START' class='btn btn-start'>
        </form>
        
    </main>
    <script type="text/javascript" src="skillsList.js"></script>
    <script>
        function updateInfoRace(element,id){
            const selectedRace = element.value;
            document.getElementById(id+'raceSkill1Name').innerHTML = skillsList["race"][selectedRace]["skill1"]["name"];
            document.getElementById(id+'raceSkill1Description').innerHTML = skillsList["race"][selectedRace]["skill1"]["description"];
            document.getElementById(id+'raceSkill2Name').innerHTML = skillsList["race"][selectedRace]["skill2"]["name"];
            document.getElementById(id+'raceSkill2Description').innerHTML = skillsList["race"][selectedRace]["skill2"]["description"];
        }
        function updateInfoTalent(element,id){
            const selectedTalent = element.value;
            document.getElementById(id+'talentSkill1Name').innerHTML = skillsList["talent"][selectedTalent]["skill1"]["name"];
            document.getElementById(id+'talentSkill1Description').innerHTML = skillsList["talent"][selectedTalent]["skill1"]["description"];
            document.getElementById(id+'talentSkill2Name').innerHTML = skillsList["talent"][selectedTalent]["skill2"]["name"];
            document.getElementById(id+'talentSkill2Description').innerHTML = skillsList["talent"][selectedTalent]["skill2"]["description"];
        }
        window.onload = function() {
            for(let i=1; i<5; i++){
                const selectElement1 = document.getElementById('characterRace'+i);
                const event1 = new Event('change');
                selectElement1.dispatchEvent(event1);
                const selectElement2 = document.getElementById('characterTalent'+i);
                const event2 = new Event('change');
                selectElement2.dispatchEvent(event2);
            }        
        };
    </script>
</body>
</html>