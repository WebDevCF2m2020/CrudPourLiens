<?php

?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Portfolio | Me contacter</title>
    <style>
    </style>

</head>
<body>
<?php
include "menu_deconnect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Me contacter</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed itaque neque doloremque animi est praesentium. Autem dignissimos ipsam itaque quibusdam placeat iste accusamus quasi modi reiciendis. Cumque neque aut, excepturi.</p>
</header>

<main class="container">
    <form method="post" action="">
        <div class="form-group form-row">
            <label for="votreEmail" class="col-3">Votre email</label>
            <input type="email" class="form-control col-9" id="votreEmail" aria-describedby="emailHelp" placeholder="Entrez votre e-mail">
        </div>
        <div class="form-group form-row">
            <label for="votreNom" class="col-3">Votre nom</label>
            <input type="text" class="form-control col-9" id="votreNom" placeholder="Entrez votre nom" maxlength="45" size="45" >
        </div>
        <div class="form-group form-row">
            <label for="votreSociete" class="col-3">Votre société</label>
            <input type="text" class="form-control col-9" id="votreSociete" aria-describedby="emailHelp" placeholder="Entrez le nom de votre société" maxlength="45" size="45" >
        </div>
        <div class="form-group form-row">
            <label for="sujetMessage" class="col-3">Le sujet de votre message</label>
            <input type="text" class="form-control col-9" id="sujetMessage" aria-describedby="emailHelp" placeholder="Entrez le sujet de votre message">
        </div>
        <div class="form-group form-row">
            <label for="votreMessage" class="col-3">Votre message</label>
            <textarea class="form-control col-9" id="votreMessage" placeholder="Entrez votre message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</main>

<?php
require_once "javascript.php";
?>

</body>
</html>


