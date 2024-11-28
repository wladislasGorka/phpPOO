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
    echo $monElfe->getName() . " : " . $monElfe->getPv() . "<br>";
    $monElfe->arc();

    $monNain = new Nain("Robert");
    echo $monNain->getName() . " : " . $monNain->getPv() . "<br>";

    $combat = new Combat($monElfe,$monNain);
    while(!$combat->isEnded()){
        $combat->turn();
    }
    $combat->result();

    // $DomeDuTonerre;
    // $DomeDuTonerre = [$monElfe, $monNain];
    // $elfe = $DomeDuTonerre[0];
    // $nain = $DomeDuTonerre[1];
?>
    
</body>
</html>