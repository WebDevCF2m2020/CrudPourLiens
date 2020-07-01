<?php
// formulaire envoyé
if(isset($_POST['thelogin'],$_POST['thepwd'])){
    // variables locales protégées
    $thelogin = htmlspecialchars(strip_tags(trim($_POST['thelogin'])),ENT_QUOTES);
    $thepwd = htmlspecialchars(strip_tags(trim($_POST['thepwd'])),ENT_QUOTES);

    // vérification si au moins une des 2 variables locales ne sont pas vides
    if(!empty($thelogin)&&!empty($thepwd)){
        // sql
        $sql = "SELECT * FROM user WHERE thelogin='$thelogin' AND thepwd='$thepwd';";
        // suppression (mode parano) du risque d'injection SQL, ne marche que avec mysqli, bug si on a déjà protégé nos variables, devient inutile lors de requêtes préparées
        // $sql = mysqli_real_escape_string($db,$sql);
        // exécution de la requête
        $recup_user = mysqli_query($db,$sql) or die(mysqli_error($db));
        // 1 ligne si on arrive à se connecter, 0 sinon
        if(mysqli_num_rows($recup_user)==1){
            // création de la connexion à notre session
            // on remplit la session avec le tableau associatif de notre requête $recup_user
            $_SESSION = mysqli_fetch_assoc($recup_user);
            // on garde notre identifiant de session (PHPSESSID)
            $_SESSION['notresession'] = session_id();
            // on supprime le mot de passe par soucis de sécurité avec unset
            unset($_SESSION['thepwd']);
            // redirection vers notre contrôleur frontal
            header("Location: ./");
        }else{
            $message = "Login ou mot de passe incorrect(s)";
        }
    }else{
        $message = "Login ou mot de passe au format(s) invalide(s)";
    }

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
        <?php

        if(isset($message)) echo "<h3>$message</h3>";
        ?>
        <div class="form-group form-row">
            <label for="votreLogin" class="col-3">Votre login</label>
            <input name="thelogin" type="text" class="form-control col-9" id="votreLogin" aria-describedby="loginHelp" placeholder="Entrez votre login" required>
        </div>
        <div class="form-group form-row">
            <label for="votrePWD" class="col-3">Votre mot de passe</label>
            <input name="thepwd" type="password" class="form-control col-9" id="votrePWD" placeholder="Entrez votre mot de passe" required>

            <button type="submit" class="btn btn-primary">Envoyer</button>

        </div>
    </form>
</main>

<?php
// debug
// var_dump($_POST,$_SESSION);
require_once "javascript.php";
?>

</body>
</html>


