<?php

//permet de ne pas modifier l'url
// si les parametres d'url ne sont pas présent, tu me renvoie sur index.php
if (empty($_GET) || !isset($_GET["nom"]) && !isset($_GET["prenom"]) && !isset($_GET["mail"]) && !isset($_GET["select"]) && !isset($_GET["story"])) {
    header("Location: index.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/style.css">
    <title>TP PHP LES PARAMETRES URL FORMULAIRE</title>
</head>

<body>
    <div class="text-center bg bg-dark text-white">
        <h1>Message envoyé, voici votre récapitulatif :<h1><br>
                <p>Votre nom : "<?= $_GET['nom']; ?>"</p>
                <p>Votre prénom : "<?= $_GET['prenom']; ?>"</p>
                <p>Votre mail : "<?= $_GET['mail']; ?>"</p>
                <p>Votre demande : "<?= $_GET['select']; ?>"</p>
                <p>Votre commentaire : "<?= $_GET['story']; ?>"</p>
                <a class="btn btn-success" href="index.php">RETOUR</a>
    </div>

</body>

</html>