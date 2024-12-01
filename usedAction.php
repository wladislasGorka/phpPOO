<?php
include("./autoloader.php");
session_start();

//echo '<pre>'; print_r($_POST); echo '</pre>';

// Obtenir l'objet personnage qui a utilisé le skill
$characters = $_SESSION['characters'];
$from = $_POST['usedCharacter'];
foreach ($characters as $character) {
    if ($character->getName() == $from) {
        $usedCharacter = $character;
    }
}
// Obtenir le skill utilisé
$skill = $_POST['usedSkill'];
foreach ($usedCharacter->getCharacterSkills() as $s) {
    if ($s->getName() == $skill) {
        $usedSkill = $s;
    }
}
// Obtenir la cible
$cible = $_POST['targets'];
$typeSkill = $usedSkill->getType();
if ($typeSkill == 'Mob') {
    $target = [$_SESSION['mobs'][$_SESSION['level']]];
}
if ($typeSkill == 'Self') {
    $target = [$usedCharacter];
}
if ($typeSkill == 'All') {
    foreach ($characters as $character) {
        $target[] = $character;
    }
}
if ($typeSkill == 'Ally') {
    foreach ($characters as $character) {
        if ($character->getName() == $cible) {
            $target = [$character];
        }
    }
}

//  echo '<pre>'; print_r($usedCharacter); echo '</pre>';
//  echo '<pre>'; print_r($usedSkill); echo '</pre>';
//  echo '<pre>'; print_r($target); echo '</pre>';

$usedCharacter->useSkill($usedSkill,$target);
$_SESSION['actionCount']++;

//  echo '<pre>'; print_r($usedCharacter); echo '</pre>';
//  echo '<pre>'; print_r($usedSkill); echo '</pre>';
//  echo '<pre>'; print_r($target); echo '</pre>';

// Si le mob est tué
if ($typeSkill == 'Mob' && $target[0]->getHealth() == 0) {
    $_SESSION['breach'] = 4;
    $_SESSION['level']++;
    foreach ($characters as $character) {
        $character->levelUp();
    }
}
// Apres 4 action du joueur le mob attack
if($_SESSION['actionCount'] == 4){
    $_SESSION['actionCount'] = 0;
    //attak
}

header('Location: battlefield.php');
//header( "refresh:5;url=battlefield.php" );