<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['notresession'])||$_SESSION['notresession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: disconnect.php");
    exit();
}
// var_dump($_POST);

if(isset($_POST['thetitle'],$_POST['theurl'],$_POST['thetext'])){

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

    <title>Portfolio | Ajouter un lien</title>
    <style>
    </style>

</head>
<body>
<?php
include "menu_connect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Administration des liens | Ajouter un lien</h1>
    <p>Bienvenue <?=$_SESSION['therealname']?></p>
</header>

<main class="container">
    <h3><a href="?admin=liensadmin" title="Retour à l'administration des liens"><img src="img/return.png" alt="Retour à l'administration des liens"/></a></h3>
    <?php
    // message d'erreur
    if(isset($message)) {
        echo "<h3>$message</h3>";
    }
    ?>
    <form method="post" action="">
        <div class="form-group form-row">
            <label for="thetitle" class="col-3">Titre de votre lien</label>
            <input type="text" class="form-control col-9" name="thetitle" placeholder="Titre de votre lien" required>
        </div>
        <div class="form-group form-row">
            <label for="theurl" class="col-3">Entrez l'url du lien</label>
            <input type="text" class="form-control col-9" name="theurl" placeholder="Entrez l'url du lien">
        </div>
        <div class="form-group form-row">
            <label for="thetext" class="col-3">Un message de description</label>
            <textarea class="form-control col-9" name="thetext" placeholder="Entrez votre message" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
    </form>
</main>

<?php
// chemin depuis index.php (CF frontal)
include "./pages/javascript.php";

?>

</body>
</html>
