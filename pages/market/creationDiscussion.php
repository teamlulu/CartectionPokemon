<?php 
    session_start();
    require_once '../../config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:../index.php');
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

    if(!empty($_POST['prix_annonce']) && !empty($_POST['id_carte']) && !empty($_POST['description_annonce'])){
    $id_vendeur = htmlspecialchars($_POST['id_vendeur']);
    $id_carte = htmlspecialchars($_POST['id_carte']);
    $prix_annonce = htmlspecialchars($_POST['prix_annonce']);
    $description_annonce = htmlspecialchars($_POST['description_annonce']);
    $id_annonce = htmlspecialchars($_POST['id_annonce']);
        

        
    // On insère dans la base de données
    $insert = $bdd->prepare('INSERT INTO discuter(id_destinateur, id_destinataire, libelle, id_annonce) VALUES(:id_destinateur, :id_destinataire, :libelle, :id_annonce)');
    $insert->execute(array(
        'id_destinateur' => $id_utilisateur,
        'id_destinataire' => $id_vendeur,
        'libelle' =>  $description_annonce,
        'id_annonce' =>  $id_annonce
    ));
    // PERMET DE VOIR LES VALEURS SAISI DANS LA REQUETE ENVOYER EN POST
    // $insert->debugDumpParams();
    header('Location:/pages/message.php');
}else{
    echo "erreur";
}
?>
</body>
</html>