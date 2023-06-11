<?php 
    session_start();
    require_once '../../config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    $id_utilisateur = $data['id'];
   
?>
<?php 
include '../../sql.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="vendreCarte.css"/>
    <title>post</title>
</head>
<body>
    <?php

    if(!empty($_POST['nomPacket'])){
    $nom_packet = htmlspecialchars($_POST['nomPacket']);

        

        
    // On insère dans la base de données
    $insert = $bdd->prepare('INSERT INTO packet(id_utilisateur, nom_packet) VALUES(:id_utilisateur, :nom_packet)');
    $insert->execute(array(
        'id_utilisateur' => $id_utilisateur,
        'nom_packet' => $nom_packet,
    ));
    //$insert->debugDumpParams();
    header('Location:/pages/collection/packet.php');
}else{
    echo "erreur";
}
?>
</body>
</html>