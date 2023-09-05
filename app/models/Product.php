<?php

class Product
{
    /** @var int */
    private $id;

    /** @var string */
    private $name;

    private $description;

    private $picture;

    private $price;

    private $rate;

    private $status;

    private $created_at;

    private $updated_at;

    private $brand_id;

    private $category_id;

    private $type_id;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function getPicture()
    {
        return $this->picture;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
        return $this;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
        return $this;
    }

    public function getRate()
    {
        return $this->rate;
    }

    public function setRate($rate)
    {
        $this->rate = $rate;
        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
        return $this;
    }

    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    public function getBrandId()
    {
        return $this->brand_id;
    }

    public function setBrandId($brand_id)
    {
        $this->brand_id = $brand_id;
        return $this;
    }

    public function getCategoryId()
    {
        return $this->category_id;
    }

    public function setCategoryId($category_id)
    {
        $this->category_id = $category_id;
        return $this;
    }

    public function getTypeId()
    {
        return $this->type_id;
    }

    public function setTypeId($type_id)
    {
        $this->type_id = $type_id;
        return $this;
    }

    /**
     * Retourne la liste de tous les produits de la BDD
     *
     * @return Product[]
     */
    public function findAll()
    {
        // Connexion à la base de données en utilisant la classe Database
        $pdo = Database::getPDO();

        // Créer la bonne requete SQL
        $sql = "SELECT * FROM product";

        // On va devoir l'exécuter
        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération de la liste des produits");
        }

        // On récupèrera le résultat sous forme d'objets
        $results = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        // On retournera le résultat
        return $results;
    }

    /**
     * Retourne un produit spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product
     */
    public function find($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM product WHERE id = $id";

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du produit n°$id");
        }

        $result = $pdoStatement->fetchObject('Product');

        return $result;
    }

    /**
     * Retourne un produit avec une catégorie spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product[]
     */
    public function findCategory($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM product WHERE category_id = $id";

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du produit n°$id");
        }

        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $result;
    }

    /**
     * Retourne un produit avec un type spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product[]
     */
    public function findType($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM product WHERE type_id = $id";

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du produit n°$id");
        }

        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $result;
    }

    /**
     * Retourne un produit avec un type spécifique via son id dans la BDD
     *
     * @param int $id
     *
     * @return Product[]
     */
    public function findBrand($id)
    {
        $pdo = Database::getPDO();

        $sql = "SELECT * FROM product WHERE brand_id = $id";

        $pdoStatement = $pdo->query($sql);
        if ($pdoStatement === false) {
            exit("Problème lors de la récupération du produit n°$id");
        }

        $result = $pdoStatement->fetchAll(PDO::FETCH_CLASS, 'Product');

        return $result;
    }
}
