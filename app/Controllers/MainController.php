<?php

class MainController extends CoreController {
    public function home() {
        // Instanciation de la classe Character
        $characterClass = new Character();

        // Je récupère tous les personnages grâce à la méthode findAll du model Character.
        $characters = $characterClass->findAll();
        
        // Instanciation de la classe Type
        $typeClass = new Type();

        // Je récupère tous les types grâce à la méthode findAll du model Type.
        $types = $typeClass->findAll();

        // Je parcoure mes types pour en faire un tableau indexé par l'ID du type
        $typesList = [];
        foreach($types as $type) {
            $typesList[$type->getId()] = $type;
        }

        // Appel de la méthode show héritée de CoreController
        $this->show('home', [
            'charactersList' => $characters,
            'typesList' => $typesList
        ]);
    }

    public function creators() {
        // Appel de la méthode show héritée de CoreController
        $this->show('creators');
    }

    public function page404()
    {
        $this->show('page404');
    }
}