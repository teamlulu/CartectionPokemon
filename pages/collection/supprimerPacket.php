<?php
require_once '../../config.php'; // ajout connexion bdd 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>supprimer packet</title>
</head>
<body>
    <?php
        $id_packet = $_GET['id_packet'];
        
                    
            //On insère dans la base de données
            $delete = $bdd->prepare("DELETE FROM packet WHERE id_packet = ?");
            $delete->bindParam(1, $id_packet);
            $delete->execute();
            header('Location:/pages/collection/packet.php');
            
            //$delete->debugDumpParams();
    ?>
</body>
</html>