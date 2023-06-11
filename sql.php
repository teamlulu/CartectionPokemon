<?php
include 'requeteSQL.php';
include 'config.php';
$bdd = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");

function connect_db(){
    $bdd = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    return $bdd;
}

function close_db() {;
    return null;
}

function createtable() {
    $bdd = connect_db();
    $requeteTable = getCreateTable();
    $bdd->query($requeteTable);
    $bdd = close_db();
}
function affiche_annonce(){
    $bdd = connect_db();
    $str = $bdd->prepare(getIdAnnonce());
    $str->execute();

    $str2 = $bdd->prepare(getAnnonce());
    $str2->execute();
    $table2 = $str2->fetchAll();
    $str2 = close_db();
    $bdd = close_db();
    return $table2;
}
function affiche_annonce2(){
    $bdd = connect_db();
    $str = $bdd->prepare(getIdAnnonce());
    $str->execute();

    $str2 = $bdd->prepare(getAnnonce());
    $str2->execute();
    $table2 = $str2->fetchAll();
    $str2 = close_db();
    $bdd = close_db();
    return $table2;
}

function last_annonce() {
    $bdd = connect_db();
    $str = $bdd->prepare(getIdlastAnnonce());
    $str->execute();
    $idAnnonce = $str->fetch();
    $str = close_db();

    $str2 = $bdd->prepare(getlastAnnonce($idAnnonce[0]));
    $str2->execute();
    $table2 = $str2->fetchAll();
    $str2 = close_db();
    $bdd = close_db();
    return $table2;
}

function deposeAnnonce($titre, $description, $prix, $type, $publieur) {
    $bdd = connect_db();
    $requeteUser = getDeposeAnnonce($titre, $description, $prix, $type, $publieur);
    $bdd->query($requeteUser);
    $bdd = close_db();
}

function ajoutPacket($id_packet, $id_carte) {
    $bdd = connect_db();
    $requeteUser = getAjoutPacket($id_packet, $id_carte);
    $bdd->query($requeteUser);
    $bdd = close_db();
}

function vendreCarte($id, $id_carte, $prix_carte, $description_carte) {
    $bdd = connect_db();
    $requeteUser = getVendreCarte($id, $id_carte, $prix_carte, $description_carte);
    $bdd->query($requeteUser);
    $bdd = close_db();
}

function posterAnnonce($id_vendeur, $id_carte, $prix_annonce, $description_annonce) {
    $bdd = connect_db();
    $requeteUser = getPosterAnnonce($id, $id_carte, $prix_annonce, $description_annonce);
    $bdd->query($requeteUser);
    $bdd = close_db();
}

function ajoutCarte($id, $id_carte, $nom_carte, $id_serie, $image_carte, $etat, $langue) {
    $bdd = connect_db();
    $requeteCarte = getAjouteCarte($id, $id_carte, $nom_carte, $id_serie, $image_carte, $etat, $langue);
    $bdd->query($requeteCarte);
    $bdd = close_db();
}

function infos_users($idcompte) {
    $bdd = connect_db("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    $str = $bdd->prepare("SELECT id, nom, prenom, date_naissance, pseudo, email, password, avatar FROM utilisateurs");
    $str->execute();
    $matable = $str->fetchAll();
    return $matable;
    $str = close_db();

    $str2 = $bdd->prepare("SELECT nom, prenom, date_naissance, pseudo, email, password, avatar FROM utilisateurs WHERE id = ".$idcompte);
    $str2->execute();
    $table2 = $str2->fetchAll();
    return $table2;
}

function bloc_users($idcompte) {
    $bdd = connect_db("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    $str = $bdd->prepare("SELECT nom_bloc FROM bloc");
    $str->execute();
    $matable = $str->fetchAll();
    return $matable;
    $str = close_db();

    $str2 = $bdd->prepare("SELECT nom_bloc FROM bloc WHERE id = ".$idcompte);
    $str2->execute();
    $table2 = $str2->fetchAll();
    return $table2;
}

function serie_users($idcompte) {
    $bdd = connect_db("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    $str = $bdd->prepare("SELECT nom_serie FROM serie");
    $str->execute();
    $matable = $str->fetchAll();
    return $matable;
    $str = close_db();

    $str2 = $bdd->prepare("SELECT nom_serie FROM serie WHERE id = ".$idcompte);
    $str2->execute();
    $table2 = $str2->fetchAll();
    return $table2;
}

function scriptConnect($username, $password) {
    $bdd = connect_db();
    $requeteConnect = getScriptConnect($username, $password);
    $str = $bdd->prepare($requeteConnect);
    $str->execute();
    $table = $str->fetchAll();
    $str = close_db();
    return $table;
}

function countUsername($username) {
    $bdd = connect_db();
    $requeteCount = getCountUsername($username);
    $str = $bdd->prepare($requeteCount);
    $str->execute();
    $count = $str->rowCount();
    $bdd = close_db();
    return $count;
}

function countMail($mail) {
    $bdd = connect_db();
    $requeteCount = getCountMail($mail);
    $str = $bdd->prepare($requeteCount);
    $str->execute();
    $count = $str->rowCount();
    $bdd = close_db();
    return $count;
}

function scriptInscription($nom, $prenom, $dateNaiss, $username, $mail, $password, $fichier) {
    $bdd = connect_db();
    $requeteInscription = getScriptInscription($nom, $prenom, $dateNaiss, $username, $mail, $password, $fichier);
    $bdd->query($requeteInscription);
    $bdd = close_db();
}


function modifNom($idcompte){
    $bdd = connect_db("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    $str = $bdd->prepare("UPDATE utilisateurs
    SET nom = '',
    prenom = '',
    email = '',
    pseudo = '',
    password_utilisateur ='',
    date_naissance ='',
    WHERE id = ".$idcompte);
    $str->execute();
    
}

function allTypes() {
    $bdd = connect_db();
    $requete = getAllTypes();
    $str = $bdd->prepare($requete);
    $str->execute();
    $table = $str->fetchAll();
    return $table;
}

function allAnnoncesWithType($idType) {
    $bdd = connect_db();
    $str = $bdd->prepare(getAllAnnonces($idType));
    $str->execute();
    $table = $str->fetchAll();
    return $table;
}

function ajouterFavoris($idcompte, $id_annonce){
    $bdd = connect_db();
    $str = $bdd->prepare(getAjouterFavoris($idcompte, $id_annonce));
    $str->execute();
}

function scriptRecherche($recherche, $id_utilisateur) {
    $bdd = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");
    $requeteRecherche = getRecherche($recherche, $id_utilisateur);
    $bdd->query($requeteRecherche);
    $bdd = close_db();
}