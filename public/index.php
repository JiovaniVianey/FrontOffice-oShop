<?php

// Ici j'inclus le fichier autoload.php car c'est grâce à ce fichier que je vais pouvoir inclure TOUTES mes dépendances composer (donc ce qu'il y a dans le dossier vendor)
require_once __DIR__ . "/../vendor/autoload.php";

// On inclus le controller pour pouvoir l'utiliser
require_once __DIR__ . "/../app/Controllers/MainController.php";
require_once __DIR__ . "/../app/Controllers/CatalogController.php";
// require_once __DIR__ . "/controllers/ErrorController.php";

// On veut récupérer le paramètre d'URL "page"
// empty permet de checker si un élément est vide
// le '!' avant le empty me permet de checker l'inverse de ce que fait empty de base, donc ici je check si $_GET['_url'] n'est pas vide (je rentre dans le if si $_GET['_url'] n'est pas vide)
if (!empty($_GET['_url'])) {
    // Si pas vide, alors je créer une variable $currentPage qui aura pour valeur la valeur associé a la clé page dans $_GET
    $currentPage = $_GET['_url'];
} else {
    // Sinon la valeur par défaut de $currentPage sera '/'
    $currentPage = '/';
}

// Alternative 1 :
// $currentPage = 'home';
// if (!empty($_GET['page'])) {
//     $currentPage = $_GET['page'];
// }

// Equivalent ternaire
// $currentPage = !empty($_GET['page']) ? $_GET['page'] : 'home';

// En clé, on aura un élément qu'on s'attend à voir dans l'URL
// En valeur, on aura le chemin à appeler selon cette fameuse URL (Controller et méthode du Controller)

// Je créer une instance de AltoRouter (la librairie que j'ai installé)
$router = new AltoRouter();

// dump($_SERVER['BASE_URI']);

// On fournit à AltoRouter la partie de l'URL à ne pa sprendre en compte pour faire la comparaison entre l'URL courante et l'url de la route
// LA valeur de $_SERVER['BASE_URI'] est donnée par le fichier .htaccess. Elle correspond au chemin de la racine du site, ici se termine par public
$router->setBasePath($_SERVER['BASE_URI']);

// Ci dessous je map (mapping) la route '/'
// $router->map(
//     'GET', // la méthode HTTP qui est autorisée
//     '/', // l'url à laquelle cette route réagit
//     [ // la clé target qui va stocker le nom de la method 'action' et le nom du controller 'MainController')
//         'controller' => 'MainController', // Nom du controller
//         'action' => 'home' // Nom de la methode
//     ],
//     'home' // On nomme notre route
// );

// // Ci dessous je map (mapping) la route '/category'
// $router->map(
//     'GET', // la méthode HTTP qui est autorisée
//     '/catalogue/categorie/[i:id]', // l'url à laquelle cette route réagit
//     [ // la clé target qui va stocker le nom de la method 'action' et le nom du controller 'CatalogController')
//         'controller' => 'CatalogController', // Nom du controller
//         'action' => 'category' // Nom de la methode
//     ],
//     'catalog-category' // On nomme notre route
// );

$router->addRoutes(array(
    array('GET','/', [
        'controller' => 'MainController', 
        'action' => 'home'
    ], 'home'),
    array('GET','/catalogue/categorie/[i:id]', [
        'controller' => 'CatalogController',
        'action' => 'category'
    ], 'catalog-category')
  ));

// Ici on check si la route sur laquelle on est a bien été mappé
$match = $router->match();
// dump($match);

// Pour vérifier si la route existe bien
if ($match) { // Ici je verifie si $match n'est pas = false
    // On rentre dans le if que si la route existe bel et bien
    // Ci dessous je stock dans $controllerToUse le nom du controller dont j'ai besoin pour la route demandée
    $controllerToUse = $match['target']['controller'];
    $methodToUse = $match['target']['action'];
    // Maintenant qu'on a récupéré le nom de la methode ainsi que le nom du controller, on va devoir executer la méthode qui est dans le controller
    // Pour se faire, on va devoir créer une instance du contrller
    $controller = new $controllerToUse(); // $controller est une instance de la classe souhaité (par exemple MainController)
    // Maintenant on va executer la methode $methodToUse
    $controller->$methodToUse($match['params']);
}
