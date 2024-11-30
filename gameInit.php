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
session_start();
var_dump($_POST);
//Instanciation des personnages.

//Personnages stockés dans la session

//Instanciation des Mobs

//Mobs stockés dans la session

//redirection sur combat.php