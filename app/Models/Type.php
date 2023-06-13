<?php

class Type extends CoreModel {
    // Propriétés non héritées, correspondantes aux champs de la table
    protected $name;

    /**
     * Get the value of name
     */ 
    public function getName() {
        return $this->name;
    }

    /**
     * Set the value of name
     */ 
    public function setName($name) {
        if (is_string($name)) {
            $this->name = $name;
        }
    }

      /**
     * Méthode pour chercher tous les types
     *
     * @return array[Type]
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM `type`;';

        // Database::getPDO() me retourne l'instance PDO contenant la connexion à la BDD
        $pdo = Database::getPDO();

        // Je donne à PDO ma requete SQL
        // PDO me répond sous la forme d'un "jeu de résultat"
        $pdoStatement = $pdo->query($sql);

        // Je récupere tout les résultats sous la forme d'un tableau
        // indexé qui contient des tableau associatifs
        // Cool mais pas super pratique...
        // return $pdoStatement->fetchAll(PDO::FETCH_ASSOC);

        // Je récupere TOUT les résultats sous la forme d'un tableau
        // indexé, qui contient des instances de la classe Category
        // avec les propriétés déjà bien renseignées par PDO
        return $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);
    }
}