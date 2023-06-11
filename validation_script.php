<?php 
    require_once 'config.php'; // On inclu la connexion à la bdd

    // Si les variables existent et qu'elles ne sont pas vides
    if(!empty($_POST['idUtilisateur']) && !empty($_POST['idCarte']) && !empty($_POST['idSerie']) && !empty($_POST['idBloc']) && !empty($_POST['imageCarte']))
    {
        // Patch XSS
        $idUtilisateur = htmlspecialchars($_POST['idUtilisateur']);
        $idCarte = htmlspecialchars($_POST['idCarte']);
        $idSerie = htmlspecialchars($_POST['idSerie']);
        $idBloc = htmlspecialchars($_POST['idBloc']);
        $imageCarte = htmlspecialchars($_POST['imageCarte']);

                            // On insère dans la base de données
                            $insert = $bdd->prepare('INSERT INTO collection(id, id_carte, id_serie, id_bloc, image_carte) VALUES(:id, :id_carte, :id_serie, :id_bloc, :image_carte)');
                            $insert->execute(array(
                                'id' => $idUtilisateur,
                                'id_carte' => $idCarte,
                                'id_serie' => $idSerie,
                                'id_bloc' => $idBloc,
                                'image_carte' => $imageCarte,
                            ));
                            // On redirige avec le message de succès
                            die();
    }
?>