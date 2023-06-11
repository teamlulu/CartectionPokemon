<?php
    $db = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    session_start();
    // si la session existe pas soit si l'on est pas connecté on redirige
    if(!isset($_SESSION['user'])){
        header('Location:index.php');
        die();
    }
    // On récupere les données de l'utilisateur
    $req = $db->prepare('SELECT * FROM utilisateurs WHERE token = ?');
    $req->execute(array($_SESSION['user']));
    $data = $req->fetch();
    $id_user = $data['id'];
    require_once '../../../../../config.php'; // ajout connexion bdd 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="cartes.css"/>
    <title>Series</title>
</head>
<body>
<div class="container">
        <div class="row">
            <?php
                // if (isset($_GET['id_serie' and 'id_bloc'])) {
                    $id_serie = $_GET['id_serie'];
                    $id_bloc = $_GET['id_bloc'];
                    $id_user = $data['id'];
                    //echo $id_bloc, $id_serie, $id_user;

                    $req = $db->prepare("SELECT * FROM collection WHERE id_serie = ".$id_serie." AND id = ".$id_user." ORDER BY id_carte ASC");
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
                                <form name="vendreCarte" action="vendreCarte_traitement.php" method="POST">
                                    <h2><p>Nom de la carte : <?php echo $result["nom_carte"] ?></p></h2>
                                    <h2><p>Etat de la carte :   <select name="etat">
                                                                    <option value="1" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Neuve</option> 
                                                                    <option value="2" <?php if ($selectionneChoix=="2"){print 'selected';}?>>Excellente</option>
                                                                    <option value="3" <?php if ($selectionneChoix=="3"){print 'selected';}?>>très bon</option>
                                                                    <option value="4" <?php if ($selectionneChoix=="4"){print 'selected';}?>>bon</option>    
                                                                    <option value="5" <?php if ($selectionneChoix=="5"){print 'selected';}?>>abimée</option>
                                                                </select></p></h2>                                
                                    <h2><p>Langue de la carte :   <select name="langue">
                                        <option value="1" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Francaise</option> 
                                        <option value="2" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Anglaise</option>
                                        <option value="3" <?php if ($selectionneChoix=="2"){print 'selected';}?>>Japonaise</option>
                                    </select></p></h2> 
                                    <h2><p>Prix : <input type="number" name="prix_carte"></p></h2>
                                    <h2><p>Description : <input type="text" name="description_carte"></p></h2>
                                    <div class="invisible">
                                        <input type="int" name="id_user" value="<?php echo $id_user ?>"></input>
                                        <input type="text" name="image" value="<?php echo $result["image_carte"] ?>"></input>
                                        <input type="int" name="id_carte" value="<?php echo $result["id_carte"] ?>"></input>
                                        <input type="int" name="id_serie" value="<?php echo $result["id_serie"] ?>"></input>
                                    </div>
                                    <input id="ajoutCarte" type="submit" name="ajouterCarte" value="Vendre" onclick="vendreCarte()"/>                            
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
                    <!-- <img src="<?php echo $result["image_carte"] ?>" width="100%" height="100%"> -->
                </div>
            </div>
            </a>


            <?php
                }
            //}
            ?>
        </div>
    </div>
    <script src="script.js"></script>
</body>
</html>