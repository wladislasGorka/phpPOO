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
echo '<pre>'; print_r($characters); echo '</pre>';
//Personnages stockés dans la session

//Instanciation des Mobs

//Mobs stockés dans la session

//redirection sur combat.php