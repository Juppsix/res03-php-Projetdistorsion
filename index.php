<?php

require("services/Router.php");
require("models/User.php");

$router = new Router();

//////////////////// Création de compte //////////////////////

if ((isset($_POST["firstName"]) && !empty($_POST["firstName"])) && (isset($_POST["lastName"]) && !empty($_POST["lastName"])) && (isset($_POST["email"]) && !empty($_POST["email"])) && (isset($_POST["password"]) && !empty($_POST["password"])) && (isset($_POST["confirmPassword"]) && !empty($_POST["confirmPassword"]))) {
    
    if ($_POST["password"] === $_POST["confirmPassword"]) {
        
        $hash = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $newUser = new User($_POST["firstName"], $_POST["lastName"], $_POST["email"], $hash, $_POST["confirmPassword"]);
        
        saveUser($newUser);
    }
    
    else {
        
        echo "Les deux mots de passe ne sont pas identiques.";
    }
    
}
else if ((isset($_POST["firstName"]) && empty($_POST["firstName"])) || (isset($_POST["lastName"]) && empty($_POST["lastName"])) || (isset($_POST["email"]) && empty($_POST["email"])) || (isset($_POST["password"]) && empty($_POST["password"])) || (isset($_POST["confirmPassword"]) && empty($_POST["confirmPassword"]))) {
    
    echo "L'un des champs n'est pas rempli.";
}

//////////////////////// Connexion //////////////////////////

if ((isset($_POST["loginEmail"]) && !empty($_POST["loginEmail"])) && (isset($_POST["loginPassword"]) && !empty($_POST["loginPassword"]))) {
    
    $recup = loadUser($_POST["loginEmail"]);
    $mdp = $recup->getPassword();

    if (password_verify($_POST["loginPassword"], $mdp)) {
        $_SESSION["statut"] = true;
        $_SESSION["userId"] = $recup -> getId();
        $_GET["route"] = "homepage";
    }
}

else if ((isset($_POST["email"]) && empty($_POST["email"])) || (isset($_POST["password"]) && empty($_POST["password"]))) {
    
    echo "L'un des champs n'est pas rempli.";
}


if (isset($_GET["route"])) {
    $router->checkRoute($_GET["route"]);
}
else {
    $router->checkRoute("");
};

?>