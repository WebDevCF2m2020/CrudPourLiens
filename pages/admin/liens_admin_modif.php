<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['notresession'])||$_SESSION['notresession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: disconnect.php");
    exit();
}
// var_dump($_POST);

// si le formulaire est envoyé
/*
 * COPIE CONFORME DE L'INSERT DE LA PAGE liens_admin_ajout.php
 */
if(isset($_POST['thetitle'],$_POST['theurl'],$_POST['thetext'])){
    // si erreur vaudra "" => empty
    $thetitle = htmlspecialchars(strip_tags(trim($_POST['thetitle'])),ENT_QUOTES);
    // si erreur vaudra false => !$theurl => $theurl!=true => $theurl==false => $theurl===false
    $theurl = filter_var($_POST['theurl'],FILTER_VALIDATE_URL);
    // si erreur vaudra "" => empty
    $thetext = htmlspecialchars(
                strip_tags(
                    trim($_POST['thetext']),'<p><a><img><br><strong><b><i><em>'),ENT_QUOTES);

    // si on a une erreur de type
    if(empty($thetitle)||empty($thetext)||$theurl===false){
        $message = "Erreur de type de données, veuillez recommencer";
    }else {
        // sql
        $sql = "INSERT INTO liens (thetitle, theurl, thetext) VALUES ('$thetitle', '$theurl', '$thetext');
";
        $insert = mysqli_query($db,$sql) or die(mysqli_error($db));
        // redirection
        header("Location: ?admin=liensadmin&message=insert");
    }
}

// on vérifie l'existence de la variable get id et que son contenu de type string ne contient que des numériques
/*
 * COPIE CONFORME DU DELETE DE LA PAGE liens_admin_delete.php
 */
if(isset($_GET['id'])&&ctype_digit($_GET['id'])){
    // conversion en entier
    $id = (int) $_GET['id'];

    // on confirme la suppression en rajoutant la variable get ok
    if(isset($_GET['ok'])){
        $sql = "DELETE FROM liens WHERE idliens=$id";
        // suppression
        mysqli_query($db,$sql)or die(mysqli_error($db));
        // redirection - ajout d'une variable GET['message'] pour la confirmation, ici de la suppression (&message=delete)
        header("Location: ?admin=liensadmin&message=delete");
    }

    // préparation de la requête
    $sql = "SELECT thetitle, theurl FROM liens WHERE idliens=$id";
    // exécution de la requête
    $recup = mysqli_query($db,$sql) or die(mysqli_error($db));
    // si on trouve une ligne de résultat 1 vaut true
    if(mysqli_num_rows($recup)){
        $liens = mysqli_fetch_assoc($recup);
        // mysqli_num_rows($recup) vaut 0 donc false
    }else{
        $erreur = "Cet article n'existe déjà plus!";
    }
// l'id n'existe pas ou n'est pas valide
}else{
    $erreur ="Arrête tes magouilles";
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

    <title>Portfolio | Modifier le lien : <?php ?></title>

</head>
<body>
<?php
include "menu_connect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Administration des liens | Modifier le lien :</h1>
    <h2 class="display-5 text-center mb-4"><?php ?>titre</h2>
    <p>Bienvenue <?=$_SESSION['therealname']?></p>
</header>

<main class="container">
    <h3><a href="?admin=liensadmin" title="Retour à l'administration des liens"><img src="img/return.png" alt="Retour à l'administration des liens"/></a></h3>
    <?php
    // message d'erreur
    if(isset($message)) {
        echo "<hr><h3>$message</h3><hr>";
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
