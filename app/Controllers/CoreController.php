<?php

class CoreController
{ 
    // Méthode s'occupant d'afficher un template (+ header et footer)
    protected function show($viewName, $viewVars = array())
    {
        // Avec global cela nous permet d'accéder à la variable $router
        // définie dans notre FrontController index.php et à laquelle
        // on devrait pas avoir à accès à cause de la portée des variables
        // dans une méthode.
        // On verra plus tard comment transmettre cette information
        // de façon plus élégante :)
        global $router;

        // Je récupère l'URL racine du site
        $absoluteUrl = $_SERVER['BASE_URI'];
        
        // J'appelle mes templates !
        include __DIR__.'/../views/header.tpl.php';
        include __DIR__.'/../views/'.$viewName.'.tpl.php';
        include __DIR__.'/../views/footer.tpl.php';
    }
}