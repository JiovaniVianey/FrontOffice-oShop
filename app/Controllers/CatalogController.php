<?php

class CatalogController
{
    /**
     * Affiche la page Catégories
     */
    public function category()
    {
        $this->show('category');
    }

    /**
     * Fonction qui permet d'afficher la vue
     */
    public function show($viewName, $viewData = [])
    {
        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}