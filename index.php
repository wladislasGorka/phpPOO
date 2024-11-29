<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php - POO</title>
</head>
<body>
    <?php include("./autoloader.php"); ?>

    <?php
        // Création des armées
        $elfes = ["Elrond", "Galadriel", "Legolas", "Arwen", "Thranduil"];
        $nains = ["Gimli", "Thorin", "Balin", "Dwalin", "Bombur"];
    ?>

    <!-- Formulaire choix des combattants et compétences  -->
    <form method='post' name='combat'>
        <label>Attaquant Elfe: </label>
        <select name='attaquant'>
            <?php
                foreach ($elfes as $key => $value) {
                    echo "<option value=".$value.">".$value."</option>";
                }
            ?>
        </select>
        <label>Cible Nain: </label>
        <select name='cible'>
            <?php
                foreach ($nains as $key => $value) {
                    echo "<option value=".$value.">".$value."</option>";
                }
            ?>
        </select>
        <input type='submit' value='Attaque!'>
    </form>

    <?php
        $tailleArmeeElfe = 5;
        $armeeElfe = [];
        $tailleArmeeNain = 5;
        $armeeNain = [];
        for ($i = 0; $i < $tailleArmeeElfe; $i++){
            $newElfe = new Elfe($elfes[$i]);
            $newElfe->equiperArmeAleatoire();
            $newElfe->equiperTalentAleatoire();
            $armeeElfe[$newElfe->getName()] = $newElfe;
        }
        for ($i = 0; $i < $tailleArmeeNain; $i++){
            $newNain = new Nain($nains[$i]);
            $newNain->equiperArmeAleatoire();
            $newNain->equiperTalentAleatoire();
            $armeeNain[$newNain->getName()] = $newNain;
        }
        
        if(isset($_POST['attaquant']) && isset($_POST['cible'])) {
            $attaquant = $armeeElfe[$_POST['attaquant']];
            $cible = $armeeNain[$_POST['cible']];
            
            echo $_POST['attaquant'] . " attaque " . $_POST['cible'] . " !";
            $combat = new Combat($attaquant, $cible);
            $combat->attaque($attaquant, $cible);
            $combat->turnState();
        }  
    

    
    //affichage armées
    echo "<br>Etat des armées !<br>";
    foreach ($armeeElfe as $k => $v) {
        echo    " ". $v->getName() . " " . $v->getStatCombat('pv') . " / ";
        
    }
    echo "<br><br>";
    foreach ($armeeNain as $k => $v) {
        echo    " ". $v->getName() . " " . $v->getStatCombat('pv') . " / ";
    }
    echo "<br><br>";
    


    // $combattantElfe = 0;
    // $combattantNain = 0;
    // while($combattantElfe<count($armeeElfe) && $combattantNain<count($armeeNain)){
    //     $combat = new Combat($armeeElfe[$combattantElfe],$armeeNain[$combattantNain]);
    //     while(!$combat->isEnded()){
    //         $combat->turn();
    //     }
    //     $result = $combat->result();
    //     $result === "Elfe" ? $combattantElfe++ : $combattantNain++;
    // }
    // $messageFin = $combattantElfe>=count($armeeElfe) ? 
    //     "<br>Les Nains remportent la victoire !":
    //     "<br>Les Elfes remportent la victoire !";
    // echo $messageFin;

    // $DomeDuTonerre;
    // $DomeDuTonerre = [$monElfe, $monNain];
    // $elfe = $DomeDuTonerre[0];
    // $nain = $DomeDuTonerre[1];
?>
    
</body>
</html>