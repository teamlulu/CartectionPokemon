<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="collection.css">
    <title>Créer un packet</title>
</head>
<body>
    <form class="ajoutPacket" action="validationNouveauPacket.php" method="POST">
    <h1>CREER UN PACKET</h1>
    <div class="information">
        <span>Quel est le nom du packet :<input type="text" name="nomPacket"></input></span>
    </div>
    <input id="ajoutNouveauPacket" type="submit" name="ajouterNouveauPacket" value="créer le packet" onclick="creerPacket()"/>                            
    </form>
</body>
</html>