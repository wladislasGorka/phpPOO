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

    $DomeDuTonerre;
    $DomeDuTonerre = [$monElfe, $monNain];

    $turn = 0;
    $elfe = $DomeDuTonerre[0];
    $nain = $DomeDuTonerre[1];

    while($elfe->getStatut() && $nain->getStatut()){
        if($turn%2 == 0){
            $strike = $elfe->defendre()-$nain->attaquer();
            if($strike<0){
                $elfe->setPv($elfe->getPv()+$strike);
            }
        }else{
            $strike = $nain->defendre()-$elfe->attaquer();
            if($strike<0){
                $nain->setPv($nain->getPv()+$strike);
            }
        }
        
        echo "<br>Turn $turn: <br>";
        echo $elfe->getName() . " : " . $elfe->getPv() . " ( " . $elfe->getStatut() . " )<br>";
        echo $nain->getName() . " : " . $nain->getPv() . " ( " . $nain->getStatut() . " )<br>";

        $turn++;
    }
    if(!$elfe->getStatut()){
        echo "<br>L'elfe est mort !";
    }
    if(!$nain->getStatut()){
        echo "<br>Le nain est mort !";
    }
?>
    
</body>
</html>