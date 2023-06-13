<?php class CoreModel {
    // Propriétés communes aux Models
    protected $id;
    protected $created_at;
    protected $updated_at;

    // J'écris les GETTERs
    // (aucun setters, car on ne veut pas laisser la possiblité d'écriture sur ces propriétés)
    public function getId() {
        return $this->id;
    }

    public function getCreatedAt() {
        return $this->created_at;
    }

    public function getUpdatedAt() {
        return $this->updated_at;
    }
}