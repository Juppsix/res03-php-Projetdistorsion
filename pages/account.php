<?php

if ($_SESSION["statut"] === true) {
    $template = "account";
    require("templates/layout.phtml");
}
else {
    require("homepage.php");
}

?>