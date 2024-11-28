<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php - POO</title>
</head>
<body>
    <?php
    include("./autoloader.php");

    // $maVoiture = new Voiture("BMW","Undefined",0,300,4);
    // echo $maVoiture->getMarque()."\n";
    // $maVoiture->deplace();

    // $monAvion = new Avion("AirFrance","A2",0,500,6,12000);
    // $monAvion->printAvion();
    // $monAvion->setMarque('AirBus');
    // $monAvion->printAvion();

    $monElfe = new Elfe("Jojo");
    //$monElfe->arc();

    $elfes = ["Elrond", "Galadriel", "Legolas", "Arwen", "Thranduil"];
    $nains = ["Gimli", "Thorin", "Balin", "Dwalin", "Bombur"];
    
    $tailleArmee = 3;
    $armeeElfe = [];
    $armeeNain = [];
    for ($i = 0; $i < $tailleArmee; $i++){
        $newElfe = new Elfe($elfes[$i]);
        $newElfe->arc();
        $armeeElfe[$i] = $newElfe;
    }
    for ($i = 0; $i < $tailleArmee; $i++){
        $newNain = new Nain($nains[$i]);
        $armeeNain[$i] = $newNain;
    }


    $combattantElfe = 0;
    $combattantNain = 0;
    while($combattantElfe<count($armeeElfe) && $combattantNain<count($armeeNain)){
        $combat = new Combat($armeeElfe[$combattantElfe],$armeeNain[$combattantNain]);
        while(!$combat->isEnded()){
            $combat->turn();
        }
        $result = $combat->result();
        $result === "Elfe" ? $combattantElfe++ : $combattantNain++;
    }
    $messageFin = $combattantElfe>=count($armeeElfe) ? 
        "<br>Les Nains remportent la victoire !":
        "<br>Les Elfes remportent la victoire !";
    echo $messageFin;

    // $DomeDuTonerre;
    // $DomeDuTonerre = [$monElfe, $monNain];
    // $elfe = $DomeDuTonerre[0];
    // $nain = $DomeDuTonerre[1];
?>
    
</body>
</html>