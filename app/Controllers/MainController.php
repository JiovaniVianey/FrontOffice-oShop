<?php

class MainController
{
    /**
     * Affiche la page d'accueil du site
     */
    public function home()
    {
        // TODO : On doit récupérer les données (liste des catégories)

        // TODO : Passer les catégories à la vue
        $this->show('home');
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