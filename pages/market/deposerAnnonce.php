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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../tous/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>deposer une annonce</title>
</head>
<body>
    <?php
    //require('../tous/navbar.php');
    ?>

<header>
        <div class="section_1">

        </div>
        <div class="section_2">

        </div>
        <div class="section_3">
            <div class="section_3_partion_1">
                <h1 class="welcome_message"></h1>
            </div>
            <div class="formDepot">
            <form action="../market/deposeAnnonce_script.php" method="POST">
        <center>
            <div class="leFormDepot">
        <br><br><br><br>   
        <label>Quel est le titre de votre annonce ? : </label>
        <input type="text" name="TitreAnnonce" placeholder="Titre" value=""/><br><br>
        <!-- <label>Choisissez une photo pour votre annonce : </label>
        <input type="file" name="PhotoAnnonce" placeholder="" value=""/> <br><br>-->
        <label>Décrivez votre annonce : </label>
        <input type="text" name="DescriptionAnnonce" placeholder="Description" value=""/> <br><br>
        <label>Quel est le type de votre annonce : </label>
        <select name="type">
                    <option value="">Type</option> 
                    <option value="1" <?php if ($selectionneChoix=="1"){print 'selected';}?>>Moto</option>
                    <option value="2" <?php if ($selectionneChoix=="2"){print 'selected';}?>>Automobile</option>
                    <option value="3" <?php if ($selectionneChoix=="3"){print 'selected';}?>>Informatique</option>    
                    <option value="4" <?php if ($selectionneChoix=="4"){print 'selected';}?>>Immobilier</option>

        </select><br><br>
        <label>Quel est le prix de l'annonce ? : </label>
        <input type="number" name="PrixAnnonce" placeholder="Quel est le prix de votre annonce ?" value=""/> <br><br><br><br> 
        <input id="DeposeAnnonce" type="submit" name="DeposerAnnonce" placeholder="Déposez votre annonce" onclick="deposeAnnonce()"/>
</div>
    </center>
    </form>
</div>
           </div>

        </div>
    

</header>
</body>
</html>