<?php 
    session_start();
    require_once '../config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Accueil</title>
</head>
<body>
    <?php
    require_once 'navbar.php';
    ?>
        <div class="section_3">
            <div class="section_3_partion_1">
                <h1 class="welcome_message"><center> Bienvenue sur <br> cartection pokemon <br> <?php echo $data['pseudo']; ?></center></h1>
            </div>
        </div>
</body>
</html>