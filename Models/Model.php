<?php

class Model
{ // Début de la Classe

    private $bd;

    private static $instance = null;

    /*
     * Constructeur créant l'objet PDO et l'affectant à $bd
     */
    private function __construct()
    { // Fonction qui sert à faire le lien avec la BDD

        $dsn = "mysql:host=localhost;dbname=brief_livre"; // Coordonnées de la BDD
        $login = "root"; // Identifiant d'accès à la BDD
        $mdp = ""; // Mot de passe d'accès à la BDD
        $this->bd = new PDO($dsn, $login, $mdp);
        $this->bd->query("SET NAMES 'utf8'");
        $this->bd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }


    // get_model()

    public static function get_model()
    { // Fonction qui sert à créer une instance de Model pour l'appeler dans chaque Controller (équivalent de $connex)
        if (is_null(self::$instance)) {
            self::$instance = new Model();
        }
        return self::$instance;
    }


    public function get_insert_user($Nom, $Prenom, $Mail, $Password)
    {


        $r = "INSERT INTO `users`(`nom`, `prenom`, `mail`, `password`) VALUES (:Nom, :Prenom, :Mail, :Password)";
        $stmt = $this->bd->prepare($r);
        $stmt->execute(array(":Nom" => $Nom, ":Prenom" => $Prenom, ":Mail" => $Mail, ":Password" => $Password));

    }

    public function get_connexion_user()
    {

        $email = $_POST['email'];
        $password = $_POST['password'];

        $requete = "SELECT * FROM `users` WHERE mail=:email AND password=:password";
        $stmt = $this->bd->prepare($requete);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            $donnees = $stmt->fetch();
            $nom = $donnees[1];
            $prenom = $donnees[2];
            $admin = $donnees[5];
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['admin'] = $admin;

            return true;
        } else {
            return false;
        }

    }





} // Fin de la Classe