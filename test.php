<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    //connect to mysql db
    $bdd = new PDO("mysql:host=mysql-cartectionpokemon.alwaysdata.net;dbname=cartectionpokemon_bdd;charset=utf8", "289236", "Cartection1$");

    //read the json file contents
    $jsondata = file_get_contents('new.json');
    
    //convert json object to php associative array
    $data = json_decode($jsondata, true);

    $taille = sizeof($data);

    for ($i=0; $i<$taille; $i++) {

        // get the employee details
        $name = $data[$i]['name'];
        // var_dump($serie_carte);
        $image = $data[$i]['image'];
        $slash = "/";
        $resolution = "high.webp";
        $image_res = $image."/high.webp";



          //insert into mysql table
          $sql = "INSERT INTO carte(nom_carte, image_carte, id_serie, id_bloc)
          VALUES(?, ?, 35,1)";
              $req = $bdd->prepare($sql);
              $req->bindParam(1, $name);
              $req->bindParam(2, $image_res);
              //$req->bindParam(3, 1);
              $req->execute();
    }

    echo $i;
    print_r($data[80]);
?>
<script src="test.js"></script>



</body>
</html>
