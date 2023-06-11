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
    // var_dump($data);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tous/style.css">
    <link rel="stylesheet" href="market/market.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Market</title>
</head>
<body>
    <?php
    require_once('navbar.php');
    ?>
    
    <div class="MesAnnonces">
        <!--<button class="creerAnnonce"><a href="../market/deposerAnnonce.php">Créer une annonce</a></button>--> 
        <center>
            <div class="titreAnnonce">
            <h1>Liste des annonces</h1>
            </div>
        </center>


            <div class="container">
                <div class="row">
                    <?php
                        $req2 = $db->prepare("SELECT * FROM annonce ");
                        $req2->execute();

                        while($result = $req2->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="card">
                        <form action="market/creationDiscussion.php" method="post">
                        <div class="publieur_annonce">
                            <!-- <?php echo $result["id_vendeur"] ?> -->
                            
                            <?php
                                $id_vendeur = $result["id_vendeur"];

                                $req4 = $db->prepare("SELECT DISTINCT pseudo FROM utilisateurs
                                INNER JOIN annonce ON utilisateurs.id = annonce.id_vendeur
                                WHERE annonce.id_vendeur = $id_vendeur ");
                                $req4->execute();
                                $result4 = $req4->fetch(PDO::FETCH_ASSOC);
                                
                                echo "vendeur : " . $result4["pseudo"];
                            ?>
                        </div>
                        <div class="bas_carte">
                            <div class="image_annonce">
                            <?php
                                        $image_carte = $result["id_carte"];
                                        $req3 = $db->prepare("SELECT image_carte FROM carte WHERE id_carte= ".$image_carte." ");
                                        $req3->execute();
                                        $result3 = $req3->fetch(PDO::FETCH_ASSOC);

                                        
                            ?>
                            <img src="<?php echo $result3["image_carte"] ?>" alt="Avatar" style="width:130px">
                            </div>
                            <div class="boxtext">
                                <span><p> description : <?php echo $result["description_annonce"] ?></p></span><br>
                                <span><p> prix : <?php echo $result["prix_annonce"] ?> €</p></span><br>
                                <button>Acheter</button>
                            </div>
                                    <div class="invisible" >
                                        <input type="int" name="id_vendeur" value="<?php echo $id_vendeur ?>"></input>
                                        <input type="int" name="id_carte" value="<?php echo $result["id_carte"] ?>"></input>
                                        <input type="int" name="prix_annonce" value="<?php echo $result["prix_annonce"] ?>"></input>
                                        <input type="text" name="description_annonce" value="<?php echo $result["description_annonce"] ?>"></input>
                                        <input type="int" name="id_annonce" value="<?php echo $result["id_annonce"] ?>"></input>
                                    </div>
                        </div>
                        </form>
                    </div>
                
            
                    <?php
                        }
                    ?>
                </div>
            </div>
    </div>
</body>
</html>