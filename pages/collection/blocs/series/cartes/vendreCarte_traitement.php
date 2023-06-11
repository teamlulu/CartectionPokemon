<?php 
    session_start();
    require_once '../../../../../config.php'; // ajout connexion bdd 
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
include '../../../../../sql.php';
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

    if(!empty($_POST['prix_carte'])){
    $etat = htmlspecialchars($_POST['etat']);
    $langue = htmlspecialchars($_POST['langue']);
    $id_carte = htmlspecialchars($_POST['id_carte']);
    $prix_carte = htmlspecialchars($_POST['prix_carte']);
    $description_carte = htmlspecialchars($_POST['description_carte']);
        

        
    // On insère dans la base de données
    $insert = $bdd->prepare('INSERT INTO validation(id_utilisateur, id_carte, prix_carte, description_carte) VALUES(:id_utilisateur, :id_carte, :prix_carte, :description_carte)');
    $insert->execute(array(
        'id_utilisateur' => $id_utilisateur,
        'id_carte' => $id_carte,
        'prix_carte' => $prix_carte,
        'description_carte' => $description_carte,
    ));
    $delete = $bdd->prepare("DELETE FROM collection WHERE id = ? AND id_carte = ?");
    $delete->bindParam(1, $id_utilisateur);
    $delete->bindParam(2, $id_carte);
    $delete->execute();

    header('Location:/pages/collection/packet.php');
}else{
    echo "erreur";
}
?>
</body>
</html>
