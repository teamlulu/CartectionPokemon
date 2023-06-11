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
    $id_user = $data['id'];
   
?>
<?php
    require_once '../../../config.php'; // ajout connexion bdd 
    $db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="ajoutCarte.css"/>
    <title>Series</title>
</head>
<body>


    <div class="container">
        <div class="row">
            <?php
                if (isset($_GET['id_serie'])) {
                    $id = $_GET['id_serie'];

                    $req = $db->prepare("SELECT * FROM carte WHERE id_serie = ".$id." ORDER BY id_carte ASC");
                    $req->execute();
                    // $result = $req->fetch(PDO::FETCH_ASSOC);
                    // print_r($result);

                while($result = $req->fetch(PDO::FETCH_ASSOC)){
                        ?>
            <!-- <a class="lebloc" href="cartes.cartes.php?id=<?php echo $result["id_carte"] ?>"> -->

            <div class="card">
                <div class="image_carte">

                    <img id="btnPopup<?php echo $result["id_carte"] ?>" class="btnPopup" src="<?php echo $result["image_carte"] ?>" width="100%" height="100%">
                    <div id="overlay<?php echo $result["id_carte"] ?>" class="overlay"><span id="btnClose<?php echo $result["id_carte"] ?>" class="btnClose" width=50px>&times;</span>
                        <div id="popup<?php echo $result["id_carte"] ?>" class="popup">
                            <div class="imagePopup">
                                <img src="<?php echo $result["image_carte"] ?>">
                            </div>
                            <div class="infoPopup">
                                <form name="envoiCarte" action="ajoutCarte_traitement.php" method="POST">
                                    <h1 class="nomDeLaCarte"><p class="name">Nom de la carte : </p><span><?php echo $result["nom_carte"] ?></span></h1>
                                    <h1><p>Etat de la carte :   <select name="etat">
                                                                    <option value="1" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Neuve</option> 
                                                                    <option value="2" <?php if ($selectionneChoix=="2"){print 'selected';}?>>Excellente</option>
                                                                    <option value="3" <?php if ($selectionneChoix=="3"){print 'selected';}?>>très bon</option>
                                                                    <option value="4" <?php if ($selectionneChoix=="4"){print 'selected';}?>>bon</option>    
                                                                    <option value="5" <?php if ($selectionneChoix=="5"){print 'selected';}?>>abimée</option>
                                                                </select></p></h1>                                
                                    <h1><p>Langue de la carte :   <select name="langue">
                                        <option value="1" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Francaise</option> 
                                        <option value="2" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Anglaise</option>
                                        <option value="3" <?php if ($selectionneChoix=="2"){print 'selected';}?>>Japonaise</option>
                                    </select></p></h1> 
                                    <div class="invisible">
                                        <input type="text" name="nom_carte" value="<?php echo $result["nom_carte"] ?>"></input>
                                        <input type="int" name="id_user" value="<?php echo $id_user ?>"></input>
                                        <input type="text" name="image" value="<?php echo $result["image_carte"] ?>"></input>
                                        <input type="int" name="id_carte" value="<?php echo $result["id_carte"] ?>"></input>
                                        <input type="int" name="id_serie" value="<?php echo $result["id_serie"] ?>"></input>
                                    </div>
                                    <input id="ajoutCarte" type="submit" name="ajouterCarte" onclick="ajoutCarte()"/>                            
                                </form>
                            </div>
                        </div> 
                    
                    <!-- <div id="popup<?php echo $result["id_carte"] ?>" class="popup">
                            <div class="imagePopup">
                                <img src="<?php echo $result["image_carte"] ?>" width=40% height=95%>
                            </div>
                            <div class="infoPopup">
                                
                                <h1><p>Nom de la carte : <?php echo $result["nom_carte"] ?></p></h1>
                                <p>Etat de la carte :</p>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
            </a>


            <?php
                }
            }
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>