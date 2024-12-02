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
if ($typeSkill == 'Mob' && $target[0]->getHealth() <= 0) {
    $_SESSION['breach'] = 4;
    $_SESSION['level']++;
    $_SESSION['actionCount'] = 0;
    foreach ($characters as $character) {
        $character->levelUp();
        $character->setPeril(0);
    }
}
// Apres 4 action du joueur le mob attack
function maxPeril($characters){
    $maxPeril = 0;
    foreach ($characters as $character) {
        $maxPeril = max($maxPeril, $character->getPeril());
    }
    return $maxPeril;
}
function mobTarget($characters,$maxPeril){
    foreach ($characters as $character) {
        if ($character->getPeril() == $maxPeril) {
            $mobTarget[] = $character;
        }
    }
    return $mobTarget;
}
//echo $_SESSION['actionCount'];
if($_SESSION['actionCount'] == 4){
    $_SESSION['actionCount'] = 0;
    $_SESSION['breach']--;
    //attack
    $mobTargets = mobTarget($characters,maxPeril($characters));
    //var_dump($mobTargets);
    foreach ($mobTargets as $mobTarget) {
        $_SESSION['mobs'][$_SESSION['level']]->attack($mobTarget,count($mobTargets));
    }
    foreach ($characters as $character) {
        $character->setPeril(0);
    }
}

header('Location: battlefield.php');
//header( "refresh:2;url=battlefield.php" );