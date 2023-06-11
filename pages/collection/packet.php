<?php
    $db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    // On récupere les données de l'utilisateur
    $req = $db->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    $id_user = $data['id'];
    require_once '../../config.php'; // ajout connexion bdd 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="collection.css"/>
    <title>Series</title>
</head>
<body>
<div class="container">
    <button class="newPacket"><a href="ajouterLePacket.php"> créer un nouveau packet</a></button>
        <div class="row">
            <?php

                    $req = $db->prepare("SELECT * FROM packet WHERE id_utilisateur = ".$id_user." ");
                    $req->execute();

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
            ?>
            <a class="leblocP" href="mesPackets.php?id_packet=<?php echo $result["id_packet"] ?>">
            <div class="card">
                <div class="boxtext">
                    <!-- <span><p>PACKET <?php echo $result["id_packet"] ?></p></span><br> -->
                    <span><p><?php echo $result["nom_packet"] ?></p></span>
                </div>
            </div>
            </a>
            <div class="mesBoutons">
                <button><a class="lebloc" href="cartesPacket.php?id_packet=<?php echo $result["id_packet"] ?>">ajouter des cartes au packet</button>
                <button><a class="lebloc" href="supprimerPacket.php?id_packet=<?php echo $result["id_packet"] ?>">supprimer le packet</button>
            </div>
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>