<?php

// var_dump($_GET);


$regexNom = "/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.'-]{2,25}$/u";
$arrayError = [];

if (!empty($_GET)) {
    if (isset($_GET["nom"])) {
        if (empty($_GET["nom"])) {
            $arrayError["nom"] = "Veuillez saisir votre nom";
        } elseif (!preg_match($regexNom, $_GET["nom"])) {
            $arrayError["nom"] = "Format invalide";
        }
    }
    if (isset($_GET["prenom"])) {
        if (empty($_GET["prenom"])) {
            $arrayError["prenom"] = "Veuillez saisir votre prenom";
        } elseif (!preg_match($regexNom, $_GET["prenom"])) {
            $arrayError["prenom"] = "Format invalide";
        }
    }
    if (isset($_GET["mail"])) {
        if (empty($_GET["mail"])) {
            $arrayError["mail"] = "Veuillez saisir votre mail";
        } elseif (!filter_var($_GET["mail"], FILTER_VALIDATE_EMAIL)) {
            $arrayError["mail"] = "Format invalide";
        }
    }
    if (isset($_GET["select"])) {
        if (empty($_GET["select"]) || $_GET["select"] == 0) {
            $arrayError["select"] = "Veuillez saisir votre sujet";
        }
    }
    if (isset($_GET["story"])) {
        if (empty($_GET["story"])) {
            $arrayError["story"] = "Veuillez saisir votre sujet";
        }
    }
    if (empty($arrayError)) {
        $name = htmlspecialchars($_GET["nom"]);
        $prenom = htmlspecialchars($_GET["prenom"]);
        $mail = htmlspecialchars($_GET["mail"]);
        $select = htmlspecialchars($_GET["select"]);
        $story = htmlspecialchars($_GET["story"]);
        header("Location: info.php?nom=$name&prenom=$prenom&mail=$mail&select=$select&story=$story");
    }
}




?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>TP PHP LES PARAMETRES URL FORMULAIRE</title>
</head>

<body>

    <div class="bg-dark text-white">
        <h1 class="text-center">Formulaire de Contact</h1>

        <form action="index.php" method="GET">
            <div class="row g-3 align-items-center ps-5">
                <div class="col-auto">
                    <label for="nom" class="col-form-label">Nom :</label><span class="text-danger">
                        <?=
                        $arrayError["nom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_GET["nom"]) ? htmlspecialchars($_GET["nom"]) : "" ?>" placeholder="Nom..." type="text" name="nom" required id="nom" class="form-control" aria-describedby="passwordHelpInline">

                    <label for="prenom" class="col-form-label">Prénom :</label><span class="text-danger">
                        <?=
                        $arrayError["prenom"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_GET["prenom"]) ? htmlspecialchars($_GET["prenom"]) : "" ?>" placeholder=" Prénom..." type="text" name="prenom" required id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">

                    <label for="inputPassword6" class="col-form-label">Mail :</label><span class="text-danger">
                        <?=
                        $arrayError["mail"] ?? " ";
                        ?>
                    </span>
                    <input value="<?= isset($_GET["mail"]) ? htmlspecialchars($_GET["mail"]) : "" ?>" placeholder=" Nom.prénom@mail.com..." type="mail" required name="mail" id="inputPassword6" class="form-control" aria-describedby="passwordHelpInline">


                    <div class="mt-4">
                        <label for="inputPassword6" class="col-form-label">Sujet :</label><span class="text-danger">
                            <?=
                            $arrayError["select"] ?? "";
                            ?>
                        </span>

                        <select for="select" name="select" required class="form-select">
                            <option selected value="0">Selectionner votre sujet</option>
                            <option value="1">Prix</option>
                            <option value="2">Autres</option>
                            <option value="3">+ d'options</option>
                        </select>

                        <div class="mt-5">
                            <p>Veuillez décrire votre demande :</p>
                            <label for="inputPassword6" class="col-form-label"></label><span class="text-danger">
                                <?=
                                $arrayError["story"] ?? "";
                                ?>
                            </span>

                            <textarea id="story" name="story" required rows="5" cols="33"><?= isset($_GET["story"]) ? htmlspecialchars($_GET["story"]) : "" ?></textarea>
                        </div>
                        <input class="btn btn-outline-success" type="submit" href="index.php" value="Envoyer">
                        <!-- mettre index.php dans href pour verifier le formulaire et nous retourner les informations des champs remplit
                    ne pas oublié le value="envoyer"
                rajouter des name differents à chaques input pour recupe les valeurs 
            la balise form permet de recuperer les input via le submit
        le form entoure ce qu'on souhaite recupérer
   le for permet de relier le label à l'input
-->


                    </div>
                </div>
            </div>
    </div>
    </form>


</body>

</html>