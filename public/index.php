<?php

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

/////////////////////////////// LA ROUTE
$routes = [
    '/' => [
        'controller' => 'MainController',
        'action' => 'home'
    ],
    '/category' => [
        'controller' => 'CatalogController',
        'action' => 'category'
    ]
];

// Si la page qu'on demande dans l'URL correspond à une des pages de notre liste de routes
// Alors on appelera la bonne méthode.
// Sinon erreur 404.
if (!empty($routes[$currentPage])) {
    /////////////////////////////// LE ROUTEUR
    $currentRoute = $routes[$currentPage];

    // Ici controller est un objet => une instance de la classe associé a $routes[$currentPage]["controller"]
    $controller = new $currentRoute["controller"]();

    // On récupère le nom de la méthode associée à notre route
    $methodName = $currentRoute["action"];

    // PHP modifie en premier la variable par sa valeur, puis exécute l'action
    // En mettant le $ devant le nom de "method", PHP sait qu'il doit
    // récupérer la valeur de celle-ci avant d'exécuter
    /////////////////////////////// LE DISPATCHER
    $controller->$methodName();
} else {
    $controller = new ErrorController();
    $controller->error404();
}
