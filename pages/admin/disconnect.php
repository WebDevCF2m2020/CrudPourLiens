<?php
// Déconnexion avec suppression du cookie de session

// on relance la session car on ne passe pas par le contrôleur frontal sauf en cas de require (parfois une erreur suivant la configuration du server), sinon le laisser en cas de redirection header("Location: .....")
session_start();

// Détruit toutes les variables de session
$_SESSION = array();

// Si vous voulez détruire complètement la session, effacez également
// le cookie de session.
// Note : cela détruira la session et pas seulement les données de session !
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finalement, on détruit la session.
session_destroy();

// redirection vers l'accueil public
header("Location: ../../");

