<?php
if(!isset($_POST)){
    echo "Incomplete set up. (wait redirection to index.php)";
    header( "refresh:5;url=index.php" );
    die();
}
if($_POST['characterName1']=="" || $_POST['characterName2']=="" || $_POST['characterName3']==""|| $_POST['characterName4']==""){
    echo "Incomplete set up. (wait redirection to index.php)";
    header( "refresh:5;url=index.php" );
    die();
}
include("./autoloader.php");
session_start();

//Instanciation des personnages.
for( $i=1; $i<5; $i++){
    $raceName=$_POST["characterRace$i"];
    $talentName=$_POST["characterTalent$i"];
    $characters[] = new Character($_POST["characterName$i"],new $raceName(),new $talentName());
}
//echo '<pre>'; print_r($characters); echo '</pre>';

//Personnages stockés dans la session
$_SESSION['characters']=$characters;

//Instanciation des Mobs par tirage aléatoire
//Tableau constant de toutes les créatures du jeu répartit selon leur niveau
$mobs=[
    ['Skeleton,12,2,5,1','Mimic,12,2,5,1'],
    ['Fisherman,12,2,5,1','Apothecary,12,2,5,1'],
    ['Golem,12,2,5,1','Gorgon,12,2,5,1'],
    ['Lich,12,2,5,1','Hydra,12,2,5,1'],
    ['Ferrovore,12,2,5,1','Kraken,12,2,5,1']
];
//Tirage aléatoire des Mobs pour le jeu en cours (1 créature de chaque niveau)
$selectedMobs=[];
for($i=0; $i< 5; $i++){
    $elements = explode(',', $mobs[$i][rand(0,count($mobs[$i])-1)]);
    $result = [];
    foreach ($elements as $element) {
        if (is_numeric($element)) {
            $result[] = (int)$element;
        } else {
            $result[] = $element;
        }
    }
    $selectedMobs[$i]=new Mob($result[0],$result[1],$result[2],$result[3],$result[4]);
}
echo '<pre>'; print_r($selectedMobs); echo '</pre>';

//Mobs stockés dans la session
$_SESSION['mobs']=$selectedMobs;

//Instanciation du combat
//combat stocké dans la session
//redirection sur battlefield.php
header("Location: battlefield.php");