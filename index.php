<?php
/*
 * Front Controller
 */

// session
session_start();

// dependencies

require_once "config.php";

// Mysql connection (mysqli procedural driver)

$db = mysqli_connect(DB_HOST, DB_LOGIN, DB_PWD, DB_NAME, DB_PORT);
mysqli_set_charset($db, "utf8");


// existence de la connexion valide pour l'admin
if(isset($_SESSION['notresession'])&&$_SESSION['notresession']===session_id()) {

    // routing admin
    echo "Tu es connecté";

}else {

    // routing public

    if (isset($_GET['pg'])) {
        switch ($_GET['pg']) {
            case "galerie":
                require_once "pages/galerie.php";
                break;
            case "liens":
                require_once "pages/mesliens.php";
                break;
            case "tuto1":
                require_once "pages/tutoriel1.php";
                break;
            case "tuto2":
                require_once "pages/tutoriel2.php";
                break;
            case "contact":
                require_once "pages/formulaire.php";
                break;
            case "connect":
                require_once "pages/formulaire_admin.php";
                break;
            default:
                require_once "pages/error404.php";
        }
    } else {
        require_once "pages/accueil.php";
    }
}