<?php
include '../sql.php';
$db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
?>
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
    $id_user = $data['id'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="collection/collection.css"/>
    <title>Collection</title>
</head>
<body>
    <?php
    require_once 'navbar.php'
    ?>
    <button class="voirPacket"><h3><a href="collection/packet.php">+ Voir vos packets</a></h3></button>
    <button class="ajoutCarte"><h3><a href="collection/ajoutCarte/ajoutBloc.php">+ Ajouter des cartes à votre collection</a></h3></button>
    <div class="titreCollection">
        <h1><p>votre collection</p></h1>
        <?php
                $req2 = $db->prepare("SELECT COUNT(*) AS nbCarte FROM collection WHERE id = ".$id_user." ");
                $req2->execute();
                $result2 = $req2->fetch(PDO::FETCH_ASSOC);
                $nb2 = $result2["nbCarte"];
                //$nombreCarte = parseInt($nb);
                $nombreCarte2 = intval($nb2);

                $req3 = $db->prepare("SELECT COUNT(*) AS nbCarteTotal FROM carte ");
                $req3->execute();
                $result3 = $req3->fetch(PDO::FETCH_ASSOC);
                $nb3 = $result3["nbCarteTotal"];
                //$nombreCarte = parseInt($nb);
                $nombreCarte3 = intval($nb3);
                 ?>
    </div>
    <div class="infosPossedez">
    <p><h2>Cartes possédées :<?php echo $nombreCarte2 ?>/ <?php echo $nombreCarte3 ?></h2></p>
    </div>
    <div class="container">
        <div class="row">
            <?php
                $req = $db->prepare("SELECT * FROM bloc ORDER BY id_bloc DESC");
                $req->execute();

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
            ?>
            <a class="lebloc" href="collection/blocs/series/series.php?id_bloc=<?php echo $result["id_bloc"] ?>">
            <div class="card">
                <div class="boxtext">
                    <span><p>BLOC <?php echo $result["nom_bloc"] ?></p></span><br>
                    <span><p>id <?php echo $result["id_bloc"] ?></p></span><br>
                </div>
            </div>
            </a>
                
            
            <?php
                }
            ?>
        </div>
    </div>
</body>
</html>