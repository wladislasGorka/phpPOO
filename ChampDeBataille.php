<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CDB</title>
</head>
<body>
    <?php
        if(isset($_POST['attaquant']) && isset($_POST['cible'])) {
            $attaquant = $armeeElfe[$_POST['attaquant']];
            $cible = $armeeNain[$_POST['cible']];
            
            echo $_POST['attaquant'] . " attaque " . $_POST['cible'] . " !";
            $combat = new Combat($attaquant, $cible);
            $combat->attaque($attaquant, $cible);
            $combat->turnState();
        } 
    ?>
</body>
</html>