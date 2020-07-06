<?php
// protection de l'accès à cette page, si la session n'existe pas OU qu'elle n'est pas ou plus valide
if(!isset($_SESSION['notresession'])||$_SESSION['notresession']!==session_id()) {
    // on efface définitivement la session et on est redirigé sur la page d'accueil publique
    header("Location: disconnect.php");
    exit();
}

// requête permettant de récupérer les liens dans la base de donnée
$sql="SELECT * FROM liens ORDER BY thetitle ASC;";
$recup_liens = mysqli_query($db,$sql) or die(mysqli_error($db));

// on compte le nombre de lignes de résultat
$count = mysqli_num_rows($recup_liens);

// si on a pas de résultat
// if(empty($count))
// if($count===0)
// mode court, si $count vaut 1 => true on l'inverse = false. si $count vaut 0 => false on l'inverse = true
if(!$count){
    $message = "Pas encore de liens pour le moment";
}else{
    // utilisation de mysqli_fetch_all qui va formater tous les résultats dans un tableau indexé, le paramètre non obligatoire MYSQLI_ASSOC fait que chaque ligne de ce tableau sera un tableau associatif
    $tous_les_liens = mysqli_fetch_all($recup_liens,MYSQLI_ASSOC);
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

    <title>Portfolio | Administration des liens</title>
    <style>
    </style>

</head>
<body>
<?php
include "menu_connect.php";
?>
<header class="jumbotron">
    <h1 class="display-4 text-center mb-4">Portfolio | Administration des liens</h1>
    <p>Bienvenue <?=$_SESSION['therealname']?></p>
</header>

<main class="container">
    <h3><a href="?admin=add_liens" title="ajouter un lien"><img src="img/add.png" alt="ajouter un lien"/></a></h3>
    <?php
    // pas encore de liens
    if(isset($message)) {
        echo "<h3>$message</h3>";
    }else{
        // si $count est plus grand que 1, rajoutez s à "message"
        ?>
    <h3>Vous avez <?=$count?> message<?php if($count>1) echo "s"?></h3>
    <?php
        foreach ($tous_les_liens as $item){
            ?>
            <hr>
            <h4><?=$item['thetitle']?> <a href="?admin=update_liens&id=<?=$item['idliens']?>" title="modifier ce lien"><img src="img/update.png" alt="modifier ce lien" /></a> <a href="?admin=delete_liens&id=<?=$item['idliens']?>" title="supprimer ce lien"><img src="img/delete.png" alt="supprimer ce lien" /></a> </h4>
            <p><a href="<?=$item['theurl']?>" title="<?=$item['thetitle']?>" target="_blank"><?=$item['theurl']?></a> </p>
            <p><strong>Description : </strong>
                <?php
                // comme on a encodé dans la bdd avec htmlentities et ENT_QUOTES, on utilise pour l'html autorisé (par le strip_tags) html_entity_decode avec le même flag ENT_QUOTES
                echo html_entity_decode($item['thetext'],ENT_QUOTES);
                ?>
            </p>
    <?php
        }
    }
    ?>
</main>

<?php
// chemin depuis index.php (CF frontal)
include "./pages/javascript.php";

?>

</body>
</html>
