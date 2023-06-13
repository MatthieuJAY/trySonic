<?php class Character extends CoreModel {
    // Propriétés non héritées, correspondantes aux champs de la table
    protected $name;
    protected $description;
    protected $picture;
    protected $type_id;

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
     * Get the value of description
     */ 
    public function getDescription() {
        return $this->description;
    }

    /**
     * Set the value of description
     */ 
    public function setDescription($description) {
        if (is_string($description)) {
            $this->description = $description;
        }
    }

    /**
     * Get the value of picture
     */ 
    public function getPicture() {
        return $this->picture;
    }

    /**
     * Set the value of name
     */ 
    public function setPicture($picture) {
        if (is_string($picture)) {
            $this->picture = $picture;
        }
    }

    /**
     * Get the value of type_id
     */ 
    public function getTypeId() {
        return $this->type_id;
    }

    /**
     * Set the value of type_id
     */ 
    public function setTypeId($type_id) {
        if (is_numeric($type_id)) {
            $this->type_id = $type_id;
        }
    }


    /**
     * Méthode pour chercher tous les personnages
     *
     * @return array[Character]
     */
    public function findAll()
    {
        $sql = 'SELECT * FROM `character` ORDER BY `name` ASC;';

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