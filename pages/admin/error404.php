<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['notresession'])||$_SESSION['notresession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: disconnect.php");
    exit();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

    <title>Admin | Erreur 404</title>
    <style>
    </style>

</head>
<body>
<?php
include "menu_connect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Admin | Erreur 404</h1>
    <p>Tu fais quoi là?, retourne à l'<a href="./" >accueil de l'admin</a></p>
</header>

<!--
ici notre contenu
-->

<?php
require_once "./pages/javascript.php";
?>

</body>
</html>
