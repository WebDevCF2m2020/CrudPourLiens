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

    <title>Portfolio | Se connecter</title>
    <style>
    </style>

</head>
<body>
<?php
include "menu_deconnect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Se connecter</h1>
    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed itaque neque doloremque animi est praesentium. Autem dignissimos ipsam itaque quibusdam placeat iste accusamus quasi modi reiciendis. Cumque neque aut, excepturi.</p>
</header>

<main class="container">
    <form method="post" action="">
        <div class="form-group form-row">
            <label for="votreLogin" class="col-3">Votre login</label>
            <input name="thelogin" type="text" class="form-control col-9" id="votreLogin" aria-describedby="loginHelp" placeholder="Entrez votre login" required>
        </div>
        <div class="form-group form-row">
            <label for="votrePWD" class="col-3">Votre mot de passe</label>
            <input name="thepwd" type="password" class="form-control col-9" id="votrePWD" placeholder="Entrez votre mot de passe" required>

        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</main>

<?php
// debug
var_dump($_POST);
require_once "javascript.php";
?>

</body>
</html>


