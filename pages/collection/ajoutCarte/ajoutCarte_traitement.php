<?php 
    session_start();
    require_once '../../../config.php'; // ajout connexion bdd 
   // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }

    // On récupere les données de l'utilisateur
    $req = $bdd->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    $id = $data['id'];
   
?>
<?php 
include '../../../sql.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajoutCarte.css"/>
    <title>post</title>
</head>
<body>
    
</body>
</html>
<?php
session_start();
var_dump($_POST);
$id = $_POST['id_user'];
$id_carte = $_POST['id_carte'];
$nom_carte = $_POST['nom_carte'];
$id_serie = $_POST['id_serie'];
$image_carte = $_POST['image'];
$etat = $_POST['etat'];
$langue = $_POST['langue'];

//  if (isset($id) && isset($id_carte) && isset($nom_carte) && isset($id_serie) && isset($image_carte) && isset($_etat) && isset($langue)) {
//      try {
        ajoutCarte($id, $id_carte, $nom_carte, $id_serie, $image_carte, $etat, $langue);
         header('Location: ajoutCarte.php?id_serie='. $id_serie);
//      } catch (PDOException $e) {
//          $e->getMessage();
//      }
//  }