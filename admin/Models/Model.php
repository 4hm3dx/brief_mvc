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








    public function get_all_livres()
    {

        $r = $this->bd->prepare("SELECT * FROM livre order by Titre");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_fournisseurs()
    {

        $r = $this->bd->prepare("SELECT * FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_liste_sociale()
    {

        $r = $this->bd->prepare("SELECT DISTINCT raison_sociale FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_raison_sociale()
    {
        $liste = $_POST['raison_sociale'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE raison_sociale = '$liste'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    //* Trier par localité (fournisseur)
    public function get_liste_localite()
    {

        $r = $this->bd->prepare("SELECT DISTINCT localite FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_affiche_localite($id)
    {
        // $liste = $_POST['localite'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE localite = '$id'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    // trier par pays (fournisseur)
    public function get_liste_pays()
    {

        $r = $this->bd->prepare("SELECT DISTINCT pays FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_affiche_pays($id)
    {
        // $liste = $_POST['localite'];
        $r = $this->bd->prepare("SELECT * FROM fournisseur WHERE pays = '$id'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    // trier par titre (livre)
    public function get_liste_titre()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Titre FROM livre");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_affiche_titre($id)
    {

        $r = $this->bd->prepare("SELECT * FROM livre WHERE Titre = '$id'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    // trier par auteur (livre)
    public function get_liste_auteur()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Nom_auteur, Prenom_auteur FROM livre");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_affiche_auteur($id)
    {
        $r = $this->bd->prepare("SELECT * FROM livre WHERE Nom_auteur = ? AND Prenom_auteur = ?");
        $r->execute([$id['Nom_auteur'], $id['Prenom_auteur']]);

        return $r->fetchAll(PDO::FETCH_OBJ);
    }


    public function get_insert_livre()
    {

        $ISBN = $_POST['isbn'];
        $Titre = $_POST['titre'];
        $Theme = $_POST['theme'];
        $NombrePages = $_POST['nbpages'];
        $Format = $_POST['format'];
        $Nom = $_POST['nom'];
        $Prenom = $_POST['prenom'];
        $Editeur = $_POST['editeur'];
        $Annee = $_POST['annee'];
        $Prix = $_POST['prix'];
        $Langue = $_POST['langue'];

        $requete = "INSERT INTO `livre`(`ISBN`, `Titre`, `Theme`, `Nb_pages`,`Format`,`Nom_auteur`,`Prenom_auteur`,`Editeur`,`Annee`,`Prix`,`Langue`) 
        VALUES (:ISBN, :Titre, :Theme, :NombrePages, :Format, :Nom, :Prenom, :Editeur, :Annee, :Prix, :Langue)";

        $stmt = $this->bd->prepare($requete);
        $stmt->execute(array(":ISBN" => $ISBN, ":Titre" => $Titre, ":Theme" => $Theme, ":NombrePages" => $NombrePages, ":Format" => $Format, ":Nom" => $Nom, ":Prenom" => $Prenom, ":Editeur" => $Editeur, ":Annee" => $Annee, ":Prix" => $Prix, ":Langue" => $Langue));

    }

    public function get_insert_fournisseur()
    {

        $Codef = $_POST['codef'];
        $Raison = $_POST['raisonsociale'];
        $Rue = $_POST['ruefournisseur'];
        $Codep = $_POST['codepostal'];
        $Localite = $_POST['localite'];
        $Pays = $_POST['pays'];
        $Tel = $_POST['tel'];
        $Url = $_POST['url'];
        $Mail = $_POST['email'];
        $Fax = $_POST['fax'];

        $requete = "INSERT INTO `fournisseur`(`code_fournisseur`, `raison_sociale`, `rue_fournisseur`, `code_postal`,`localite`,`pays`,`tel_fournisseur`,`url_fournisseur`,`email_fournisseur`,`fax_fournisseur`) 
        VALUES (:Codef, :Raison, :Rue, :Codep, :Localite, :Pays, :Tel, :Url, :Mail, :Fax)";

        $stmt = $this->bd->prepare($requete);
        $stmt->execute(array(":Codef" => $Codef, ":Raison" => $Raison, ":Rue" => $Rue, ":Codep" => $Codep, ":Localite" => $Localite, ":Pays" => $Pays, ":Tel" => $Tel, ":Url" => $Url, ":Mail" => $Mail, ":Fax" => $Fax));

    }

    public function get_delete_fournisseur($id)
    {
        $id = $_GET["id"];
        $requete = $this->bd->prepare("DELETE FROM fournisseur WHERE Id_fournisseur = :Id");
        $requete->bindParam(':Id', $id);
        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_retrieve_fournisseur($id)
    {
        $id = $_GET['id'];
        $requete = $this->bd->prepare("SELECT * FROM `fournisseur` WHERE Id_fournisseur=:id");
        $requete->bindParam(':id', $id);
        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_OBJ);

    }
    public function get_edit_fournisseur()
    {
        $id = $_GET['id'];
        $Codef = $_POST['codef'];
        $Raison = $_POST['raison'];
        $Rue = $_POST['rue'];
        $Codep = $_POST['codep'];
        $Localite = $_POST['localite'];
        $Pays = $_POST['pays'];
        $Telf = $_POST['telf'];
        $Url = $_POST['url'];
        $Mail = $_POST['mail'];
        $Fax = $_POST['fax'];




        $requete = $this->bd->prepare("UPDATE `fournisseur` SET `code_fournisseur`=:Codef,`raison_sociale`=:Raison,`rue_fournisseur`=:Rue,`code_postal`=:Codep,`localite`=:Localite,`pays`=:Pays,`tel_fournisseur`=:Telf,`url_fournisseur`=:Url,`email_fournisseur`=:Mail,`fax_fournisseur`=:Fax WHERE Id_fournisseur =:id");
        $requete->bindParam(":id", $id);
        $requete->bindParam(":Codef", $Codef);
        $requete->bindParam(":Raison", $Raison);
        $requete->bindParam(":Rue", $Rue);
        $requete->bindParam(":Codep", $Codep);
        $requete->bindParam(":Localite", $Localite);
        $requete->bindParam(":Pays", $Pays);
        $requete->bindParam(":Telf", $Telf);
        $requete->bindParam(":Url", $Url);
        $requete->bindParam(":Mail", $Mail);
        $requete->bindParam(":Fax", $Fax);

        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_OBJ);

    }




    public function get_all_commandes()
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    // trie des commandes en 2 étapes !! 2 par 2 

    //1 select
    public function get_affiche_ctitre()
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    public function get_all_ctitre($id)
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur WHERE c.Id_livre = $id ");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    // trier commande par fournisseur
    public function get_affiche_cfournisseur()
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_cafournisseur($id)
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur WHERE c.Id_fournisseur = $id ");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }
    // trier commande par date
    public function get_affiche_cdate()
    {

        $r = $this->bd->prepare("SELECT DISTINCT Date_achat FROM commande");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }

    public function get_all_cdate($id)
    {

        $r = $this->bd->prepare("SELECT * FROM commande c INNER JOIN livre l ON c.Id_livre=l.Id INNER JOIN fournisseur f ON c.id_fournisseur=f.Id_fournisseur WHERE c.Date_achat = '$id'");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);

    }

    //* INSERER UNE COMMANDE


    public function get_all_clivre()
    {
        $r = $this->bd->prepare("SELECT Id, Titre FROM livre");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_all_cfournisseur()
    {
        $r = $this->bd->prepare("SELECT Id_fournisseur, raison_sociale FROM fournisseur");
        $r->execute();

        return $r->fetchAll(PDO::FETCH_OBJ);
    }
    public function get_insert_commande()
    {
        $Id = $_POST['selectl'];
        $fournisseur = $_POST['selectf'];
        $date = $_POST['date'];
        $prix = $_POST['prix'];
        $exemp = $_POST['exemp'];

        $requete = $this->bd->prepare("INSERT INTO `commande`(`Id_livre`, `Id_fournisseur`, `Date_achat`, `Prix_achat`, `Nbr_exemplaires`) VALUES (:selectl,:selectf,:date,:prix,:exemp)");

        $requete->bindParam(":selectl", $Id);
        $requete->bindParam(":selectf", $fournisseur);
        $requete->bindParam(":date", $date);
        $requete->bindParam(":prix", $prix);
        $requete->bindParam(":exemp", $exemp);


        $requete->execute();

        return $requete->fetchAll(PDO::FETCH_OBJ);
    }







} // Fin de la Classe