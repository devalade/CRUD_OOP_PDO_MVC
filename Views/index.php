<?php 
require "../Controllers/PaysController.php";
require "../Controllers/BibliothequeController.php";
require "../Controllers/OuvrageController.php";
require "../Controllers/MuseeController.php";
require "../Controllers/SiteController.php";
require "../Controllers/ReferencerController.php";
require "../Controllers/VisiterController.php";
require "../Controllers/MomentController.php";

if(isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 'pays';
}

ob_start();
switch ($page) {
    case 'pays':
        require 'Pays/index.php'; 
        break;
        case 'bibliotheque': 
            require 'Bibliotheque/index.php';
            break;
    case 'musee':
        require 'Musee/index.php';
        break;
    case 'ouvrage':
        require 'Ouvrage/index.php';
        break;
    case 'site':
        require 'Site/index.php';
        break;
    case 'referencer':
        require 'Referencer/index.php';
        break;
    default:
        require 'Pays/index.php';
        break;
}

$content = ob_get_clean();
require "layouts/layouts.php";

?>