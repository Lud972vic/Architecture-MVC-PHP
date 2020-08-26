<?php
// Le fichier de config
include_once('config.php');

abstract class Model
{
    // Informations de la base de données
    private $host = DB_HOST;
    private $db_name = DB_NAME;
    private $username = DB_USERNAME;
    private $password = DB_PASSWORD;

    // Propriété qui contiendra l'instance de la connexion
    protected $connexion;

    // Propriétés permettant de personnaliser les requêtes
    public $table;
    public $id;

    /**
     * Fonction d'initialisation de la base de données
     * @return void
     **/
    public function getConnection()
    {
        // On supprime la connexion précédente
        $this->connexion = null;

        // On essaie de se connecter à la base
        try {
            $this->connexion = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->connexion->exec("set names utf8");
        } catch (PDOException $exception) {
            echo "Erreur de connexion à la BdD : " . $exception->getMessage();
        }
    }

    /**
     * Méthode permettant d'obtenir un enregistrement de la table choisie en fonction d'un id
     * @return void
     **/
    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . " WHERE id=" . $this->id;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }

    /**
     * Méthode permettant d'obtenir tous les enregistrements de la table choisie
     * @return void
     **/
    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
}
