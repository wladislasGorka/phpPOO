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
                <?php for($i=1;$i<5;$i++): $charName='characterName'.$i; $charRace='characterRace'.$i; $charTalent='characterTalent'.$i;?>
                    <section class='character'>
                        <h2>Character <?php echo $i; ?></h2>
                        <label for=<?php echo $charName; ?>>Name: </label>
                        <input type='text' name=<?php echo $charName; ?> id=<?php echo $charName; ?> required>
                        <ul>
                            <li>
                                <label for=<?php echo $charRace; ?>>Race: </label>
                                <select name=<?php echo $charRace; ?> id=<?php echo $charRace; ?> onChange='updateInfoRace(<?php echo $charRace; ?>,<?php echo $i; ?>)'>
                                <?php foreach( $races as $race): ?>
                                    <option value='<?php echo $race; ?>'><?php echo $race; ?></option>
                                <?php endforeach; ?>                    
                                </select>
                            </li>
                            <li>
                                <label for=<?php echo $charTalent; ?>>Talent: </label>
                                <select name=<?php echo $charTalent; ?> id=<?php echo $charTalent; ?> onChange='updateInfoTalent(<?php echo $charTalent; ?>,<?php echo $i; ?>)'>
                                <?php foreach( $talents as $talent): ?>
                                    <option value='<?php echo $talent; ?>'><?php echo $talent; ?></option>
                                <?php endforeach; ?>                    
                                </select>
                            </li>
                        </ul>
                        <ul class='infos'>
                            <li>Race
                                <ul>
                                    <li id='<?php echo $i; ?>raceSkill1Name'>Skill 1:</li>
                                    <li id='<?php echo $i; ?>raceSkill1Description'>Description du skill 1</li>
                                    <li id='<?php echo $i; ?>raceSkill2Name'>Skill 2:</li>
                                    <li id='<?php echo $i; ?>raceSkill2Description'>Description du skill 2</li>
                                </ul>
                            </li>
                            <li>Talent
                                <ul>
                                    <li id='<?php echo $i; ?>talentSkill1Name'>Skill 4:</li>
                                    <li id='<?php echo $i; ?>talentSkill1Description'>Description du skill 4</li>
                                    <li id='<?php echo $i; ?>talentSkill2Name'>Skill 5:</li>
                                    <li id='<?php echo $i; ?>talentSkill2Description'>Description du skill 5</li>
                                </ul>
                            </li>
                        </ul>
                    </section>                    
                <?php endfor; ?>
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