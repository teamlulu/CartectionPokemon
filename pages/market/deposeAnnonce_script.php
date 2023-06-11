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
   
?>
<?php
include '../../sql.php';
session_start();
var_dump($_POST);

if (isset($_POST['TitreAnnonce']) && isset($_POST['DescriptionAnnonce']) && isset($_POST['PrixAnnonce']) && isset($_POST['type'])) {
    try {
        deposeAnnonce($_POST['TitreAnnonce'], $_POST['DescriptionAnnonce'], $_POST['PrixAnnonce'], $_POST['type'], $data['pseudo']);
        header('Location: market.php');
    } catch (PDOException $e) {
        $e->getMessage();
    }

}