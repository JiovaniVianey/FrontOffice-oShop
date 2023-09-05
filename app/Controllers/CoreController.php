<?php

class CoreController
{
    /**
     * Fonction qui permet d'afficher la vue
     * $viewData = les données que je veux récupérer dans ma vue
     */
    public function show($viewName, $viewData = [])
    {
        $absoluteURL = $_SERVER['BASE_URI'];

        global $router;

        // Ci dessous je créer une instance du model Category, Type et Brand
        $categoryModel = new Category();
        $typeModel = new Type();
        $brandModel = new Brand();
        $productModel = new Product();

        // Ci dessous j'execute la methode findAll pour récupérer toutes les categories depuis la bdd
        $categories = $categoryModel->findAll();
        $types = $typeModel->findAll();
        $brands = $brandModel->findAll();

        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}
