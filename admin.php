Bienvenue sur admin

<?php
include 'sql.php';
$db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css"/>
    <title>Validation</title>
</head>
<body>
    
    <div class="titreCollection">
        <h1><p>Valider les annonces</p></h1>
    </div>
    <div class="container">
        <div class="row">
            <?php
                $req = $db->prepare("SELECT * FROM validation ORDER BY id ASC");
                $req->execute();

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
            ?>
            
            <div class="card">
                <div class="image_carte">

                    <img id="btnPopup<?php echo $result["id"] ?>" class="btnPopup">
                    <div id="overlay<?php echo $result["id"] ?>" class="overlay"><span id="btnClose<?php echo $result["id_carte"] ?>" class="btnClose" width=50px></span>
                            <div class="infoPopup">
                                <form action="validationAnnonce_script.php" name="formVente" method="post">
                                <div class="infoAnnonce">
                                    <p class="id_vendeur">id vendeur : <?php echo $result["id_utilisateur"] ?></p>
                                    <?php
                                        $id_utilisateur = $result["id_utilisateur"];
                                        $req2 = $db->prepare("SELECT pseudo FROM utilisateurs WHERE id= ".$id_utilisateur." ");
                                        $req2->execute();
                                        $result2 = $req2->fetch(PDO::FETCH_ASSOC);

                                        
                                    ?>
                                    <p class="pseudo_utilisateur">pseudo vendeur : <?php echo $result2["pseudo"] ?></p>
                                    <p class="id_carte">id_carte : <?php echo $result["id_carte"] ?></p>
                                    <p class="description_annonce">description :<?php echo $result["description_carte"] ?></p>
                                    <p class="prix_annonce">Prix :<?php echo $result["prix_carte"] ?>€</p>
                                    <input type="submit" placeholder="valider" value="poster l'annonce"  onclick="posterAnnonce()"></input>
                                    <?php
                                        $image_carte = $result["id_carte"];
                                        $req3 = $db->prepare("SELECT image_carte FROM carte WHERE id_carte= ".$image_carte." ");
                                        $req3->execute();
                                        $result3 = $req3->fetch(PDO::FETCH_ASSOC);

                                        
                                    ?>
                                </div>
                                <div class="imageCarte">
                                    <img src="<?php echo $result3["image_carte"] ?> ">
                                </div>
                                <div class="invisible">
                                        <input type="int" name="id_vendeur" value="<?php echo $result["id_utilisateur"] ?>"></input>
                                        <input type="int" name="id_carte" value="<?php echo $result["id_carte"] ?>"></input>
                                        <input type="int" name="prix_annonce" value="<?php echo $result["prix_carte"] ?>"></input>
                                        <input type="text" name="description_annonce" value="<?php echo $result["description_carte"] ?>"></input>
                                    </div>
                                <!-- <p class="imageCarte">image carte : <button><a href="<?php echo $result3["image_carte"] ?>">voir la carte</a></button></p> -->
                                
                                </form>
                            </div>
                        </div>
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