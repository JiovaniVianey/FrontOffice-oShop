<?php

class CatalogController
{
    /**
     * Affiche la page Catégories
     */
    public function category($params)
    {
        dump($params);
        $this->show('category', [
            'categoryId' => $params['id']
        ]);
    }

    /**
     * Fonction qui permet d'afficher la vue
     * $viewData = les données que je veux récupérer dans ma vue
     */
    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}