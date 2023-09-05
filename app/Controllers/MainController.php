<?php

class MainController extends CoreController
{
    public function test()
    {
        $brandModel = new Brand(); // peut modifier Brand avec les autres nom de model pour tester
        $list = $brandModel->findAll();
        $elem = $brandModel->find(7);
        dump($list);
        dump($elem);
    }

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
     * Show legal mentions page
     */
    public function legalMentions()
    {
        $this->show('mentions');
    }
}
