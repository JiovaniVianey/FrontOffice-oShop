<?php

class CatalogController
{
    /**
     * Affiche la page Catégories
     */
    public function category($params)
    {
        // dump() affiche les données de $params
        dump($params);
        $this->show('category', [
            'categoryId' => $params['id']
        ]);
    }

    /**
     * Show list of products attached to a type
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function type($params)
    {
        // dump() affiche les données de $params
        dump($params);
        $this->show('type', [
            'typeId' => $params['id']
        ]);
    }

    /**
     * Show list of products attached to a brand
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function brand($params)
    {
        $this->show('brand', [
            'brandId' => $params['id']
        ]);
    }

    /**
     * Show detail of a product by his id
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function product($toto)
    {
        $this->show('product', [
            'productId' => $toto['id']
        ]);
    }

    /**
     * Fonction qui permet d'afficher la vue
     * $viewData = les données que je veux récupérer dans ma vue
     */
    public function show($viewName, $viewData = [])
    {
        $absoluteURL = $_SERVER['BASE_URI'];
        require_once __DIR__ . "/../views/partials/header.tpl.php";
        require_once __DIR__ . "/../views/$viewName.tpl.php";
        require_once __DIR__ . "/../views/partials/footer.tpl.php";
    }
}