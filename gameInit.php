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
    ['Skeleton','Mimic'],
    ['Fisherman','Apothecary'],
    ['Golem','Gorgon'],
    ['Lich','Hydra'],
    ['Ferrovore','Kraken']
];
//Tirage aléatoire des Mobs pour le jeu en cours (1 créature de chaque niveau)
$selectedMobs=[];
for($i=0; $i< 5; $i++){
    $selectedMobs[$i]=$mobs[$i][rand(0,count($mobs[$i])-1)];
}
//echo '<pre>'; print_r($selectedMobs); echo '</pre>';

//Mobs stockés dans la session
$_SESSION['mobs']=$selectedMobs;

//Instanciation du combat
//combat stocké dans la session
//redirection sur battlefield.php