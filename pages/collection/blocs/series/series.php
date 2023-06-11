<?php
    require_once '../../../../config.php'; // ajout connexion bdd 
    $db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../collection.css"/>
    <title>Series</title>
</head>
<body>

<div class="container">
        <div class="row">
            <?php
                if (isset($_GET['id_bloc'])) {
                    $id = $_GET['id_bloc'];

                    $req = $db->prepare("SELECT * FROM serie WHERE id_bloc = ".$id." ORDER BY id_serie DESC");
                    $req->execute();

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
            ?>
            <a class="lebloc" href="cartes/cartes.php?id_serie=<?php echo $result["id_serie"] ?>">
            <div class="card">
                <div class="boxtext">
                    <span><p>SERIE <?php echo $result["nom_serie"] ?></p></span><br>
                    <span><p>id <?php echo $result["id_serie"] ?></p></span><br>
                </div>
            </div>
            </a>


            <?php
                }
            }
            ?>
        </div>
    </div>
</body>
</html>