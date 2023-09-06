<?php

// On va imaginer qu'il y a un dossier App puis un dossier controller dedans et on va ranger cette classe (CatalogController) dedans
namespace App\Controllers; // Maintenant jai rangé CatalogController dans le dossier imaginaire App\Controllers

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\Type;


class CatalogController extends CoreController
{
    /**
     * Affiche la page Catégories
     */
    public function category($params)
    {
        // dump() affiche les données de $params
        // dump($params);

        $productModel = new Product();
        // On stock dans $product le produit que je veux afficher en fonction de sa catégorie
        $products = $productModel->findAllByCategory($params['id']);
        /*  dump($products); */

        $this->show('category', [
            'categoryId' => $params['id'],
            'products' => $products
        ]);
    }

    /**
     * Show list of products attached to a type
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function type($params)
    {
        $productModel = new Product();

        $products = $productModel->findAllByType($params['id']);
        // dump() affiche les données de $params
        // dump($params);
        $this->show('type', [
            'typeId' => $params['id'],
            'products' => $products
        ]);
    }

    /**
     * Show list of products attached to a brand
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id)
     */
    public function brand($params)
    {
        $productModel = new Product();

        $products = $productModel->findAllByBrand($params['id']);

        $this->show('brand', [
            'brandId' => $params['id'],
            'products' => $products
        ]);
    }

    /**
     * Show detail of a product by his id
     *
     * @param [type] $params => valeurs dynamique passées à l'url (id), on les envoie dans index.php et on les intercepte ici
     */
    public function product($params)
    {
        // On va récupérer la liste de tous nos produits
        // On va se servir de notre model Product
        $productModel = new Product();
        // On stock dans $product le produit que je veux afficher en fonction de son id
        $product = $productModel->find($params['id']);
        // find() prend un parametre id, et fait une requete SQL qui va chercher une élément en fonction de son id
        dump($product);

        // 1er param => la vue qu'on veut afficher
        // 2eme param => les données qu'on veut envoyer a la vue
        $this->show('product', [
            'productId' => $params['id'],
            'product' => $product
        ]);
    }
}
