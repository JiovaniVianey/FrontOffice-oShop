<?php

class CatalogController extends CoreController
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
    public function product($params)
    {
        // On va récupérer la liste de tous nos produits
        // On va se servir de notre model Product
        // On stock dans $products tous les produits présent en bdd
        // dump($products);

        $this->show('product', [
            'productId' => $params['id']
        ]);
    }
}
