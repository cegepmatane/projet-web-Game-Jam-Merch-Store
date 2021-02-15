<?php
class Item {

    private $id;
    private $nom;
    private $type;
    private $description;
    private $prix;
    private $image;
    private $id_collection;

    function __construct($nom=null, $type=null, $description=null, $prix=null, $image=null, $id_collection=null)
    {
        $this->nom = $nom;
        $this->type = $type;
        $this->description = $description;
        $this->prix = $prix;
        $this->image = $image;
        $this->id_collection = $id_collection;
    }

    function setId($id) { $this->id = $id; }
    function setNom($nom) { $this->nom = $nom; }
    function setType($type) { $this->type = $type; }
    function setDescription($description) { $this->description = $description; }
    function setPrix($prix) { $this->prix = $prix; }
    function setImage($image) { $this->image = $image; }
    function setIdCollection($id_collection) { $this->id_collection = $id_collection; }

    function getId() { return $this->id; }
    function getNom() { return $this->nom; }
    function getType() { return $this->type; }
    function getDescription() { return $this->description; }
    function getPrix() { return $this->prix; }
    function getImage() { return $this->image; }
    function getIdCollection() { return $this->id_collection; }
}
?>