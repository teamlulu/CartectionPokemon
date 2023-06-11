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
    $id_utilisateur = $data['id'];
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="message.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Message</title>
</head>
<body>
    <?php
    require_once 'navbar.php';
    ?>
    <div class="MesAnnonces">
        <!--<button class="creerAnnonce"><a href="../market/deposerAnnonce.php">Créer une annonce</a></button>--> 
        <center>
            <div class="titreAnnonce">
            <h1>Vos discussions</h1>
            </div>
        </center>


            <div class="container">
                <div class="row">
                    <?php
                        $req = $db->prepare("SELECT * FROM discuter WHERE id_destinateur = ".$id_utilisateur." OR id_destinataire = ".$id_utilisateur." ");
                        $req->execute();

                        while($result = $req->fetch(PDO::FETCH_ASSOC)){
                    ?>
                    <div class="card">
                        <p><?php echo $result['libelle'] ?></p>
                    </div>
                
            
                    <?php
                        }
                    ?>
                </div>
            </div>
    </div>
</body>
</html>