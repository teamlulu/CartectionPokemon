<?php

function getCreateTable() {
    $requete = "CREATE TABLE IF NOT EXISTS compte (id int AUTO_INCREMENT PRIMARY KEY, nom_compte VARCHAR(50), prenom_compte VARCHAR(50), username_compte VARCHAR(50), password_compte VARCHAR(50), date_naiss DATE, mail_compte VARCHAR(50), numTel_compte CHAR(10), staff BOOLEAN)";
    return $requete;
}

function getIdlastAnnonce() {
    $requete = "SELECT id_annonce FROM annonces ORDER BY id_annonce DESC LIMIT 1";
    return $requete;
}
function getIdAnnonce() {
    $requete = "SELECT id_annonce FROM annonces ORDER BY id_annonce DESC";
    return $requete;
}
function getAnnonce() {
    $requete = "SELECT titre, description, prix, image_annonce FROM annonces ORDER BY id_annonce DESC ";
    return $requete;
}

function getlastAnnonce($id) {
    $requete = "SELECT titre, description, prix, image_annonce FROM annonces WHERE id_annonce = ".$id;
    return $requete;
}

function getDeposeAnnonce($titre, $description, $prix, $type, $publieur) {
    $requete = "INSERT INTO `annonces`(`titre`, `description`, `prix`, `id`, `id_types`, `date_publication`, `publieur`) VALUES ('".$titre."', '".$description."', '".$prix."', '1', '".$type."', now(), '".$publieur."')";
    return $requete;
}

function getAjoutPacket($id_packet, $id_carte) {
    $requete = "INSERT INTO `concerner`(`id_packet`, `id_carte`) VALUES ('".$id_packet."', '".$id_carte."')";
    return $requete;
}

function getVendreCarte($id, $id_carte, $prix_carte, $description_carte) {
    $requete = "INSERT INTO `validation`(`id_utilisateur`, `id_carte`, `prix_carte`, `description_carte`) VALUES ('".$id."', '".$id_carte."', '".$prix_carte."', '".$description_carte."')";
    return $requete;
}

function getPosterAnnonce($id, $id_carte, $prix_annonce, $description_annonce) {
    $requete = "INSERT INTO `annonce`(`id_utilisateur`, `id_carte`, `prix_carte`, `description_carte`) VALUES ('".$id."', '".$id_carte."', '".$prix_annonce."', '".$description_annonce."')";
    return $requete;
}

function getAjouteCarte($id, $id_carte, $nom_carte, $id_serie, $image_carte, $etat, $langue) {
    $requete = "INSERT INTO `collection`(`id`, `id_carte`, `nom_carte`, `id_serie`, `image_carte`, `etat`, `langue`) VALUES ('".$id."', '".$id_carte."', '".$nom_carte."', '".$id_serie."', '".$image_carte."', '".$etat."', '".$langue."')";
    return $requete;
}

function getScriptConnect($username, $password) {
    $requete = "SELECT count(*), utilisateurs.id FROM utilisateurs WHERE utilisateurs.pseudo LIKE '" . $username . "' AND utilisateurs.password LIKE MD5('" . $password . "')";
    return $requete;
}

function getScriptInscription($nom, $prenom, $dateNaiss, $username, $mail, $password, $fichier) {
    $requete = "INSERT INTO utilisateurs SET type='utilisateur', nom='".$nom."', prenom='".$prenom."', date_naissance='".$dateNaiss."', pseudo='".$username."', email='".$mail."', password=MD5('".$password."'), avatar='".$fichier."' ";
    return $requete;
}

function getCountUsername($username) {
    $requete = "SELECT * FROM compte WHERE username_compte='".$username."'";
    return $requete;
}

function getCountMail($mail) {
    $requete = "SELECT * FROM compte WHERE email='".$mail."'";
    return $requete;
}

function getAllTypes() {
    $requete = "SELECT * FROM type";
    return $requete;
}

function getAllAnnonces($idType) {
    $requete = "SELECT annonces.id_annonce, annonces.description, annonces.titre, annonces.prix, annonces.id_types FROM annonces WHERE annonces.id_types = ".$idType;
    return $requete;
}
function getAjouterFavoris($idcompte, $id_annonce) {
    $requete = "INSERT INTO `favoris`(`id`, `id_annonce`) VALUES ('".$idcompte."', '".$id_annonce."')";
    return $requete;
}
function getRecherche($recherche, $id_utilisateur) {
    $requete = "INSERT INTO recherche VALUES(1, $recherche, 1)";
    return $requete;
}