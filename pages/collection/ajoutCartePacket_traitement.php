<?php 
    require_once '../../config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['leNom'])){
        // Patch XSS
    $name = htmlspecialchars($_POST['leNom']);
    $id_packet = htmlspecialchars($_POST['id_packet']);
    $id_carte = htmlspecialchars($_POST['id_carte']);
    $image_carte = htmlspecialchars($_POST['image_carte']);

        

        
                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO concerner(id_packet, id_carte, image_carte) VALUES(:id_packet, :id_carte, :image_carte)');
                            $insert->execute(array(
                                'id_packet' => $id_packet,
                                'id_carte' => $id_carte,
                                'image_carte' => $image_carte,
                            ));
                            header('Location:/pages/collection/packet.php');
                        }else{
                            echo "probleme";
                            echo  "nom :".$name;
                            echo $id_packet;
                            echo $id_packet;
                        }