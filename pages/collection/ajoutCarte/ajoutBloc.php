<?php
include '../../../sql.php';
$db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajout.css"/>
    <title>Collection</title>
</head>
<body>
    <div class="titreCollection">
        <h2><p>Dans quel bloc se trouve la carte que vous voulez ajouter ?</p></h2>
    </div>
    <div class="container">
        <div class="row">
            <?php
                $req = $db->prepare("SELECT * FROM bloc ORDER BY id_bloc DESC");
                $req->execute();

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
            ?>
            <a class="lebloc" href="ajoutSerie.php?id_bloc=<?php echo $result["id_bloc"] ?>">
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