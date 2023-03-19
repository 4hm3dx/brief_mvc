<?php

class Controller_livre extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_all_livres()
    {
        $m = Model::get_model();
        $data = ["livres" => $m->get_all_livres()];
        $this->render("all_livres", $data);
    }
    // trier par titre (livre)
    public function action_liste_titre()
    {
        $m = Model::get_model();
        $data = ["titre" => $m->get_liste_titre(), "position" => 1];
        $this->render("liste_titre", $data);
    }
    public function action_affiche_titre()
    {
        $id = $_POST['titre'];
        if (isset($_POST['titre'])) {


            $m = Model::get_model();
            $data = ["affiche_titre" => $m->get_affiche_titre($id), "titre" => $m->get_liste_titre(), "position" => 2];
            $this->render("liste_titre", $data);
        } else {


            $this->render("liste_titre", ["position" => 1]);
        }
    }
    // trier par auteur
    public function action_liste_auteur()
    {
        $m = Model::get_model();
        $data = ["auteur" => $m->get_liste_auteur(), "position" => 1];
        $this->render("liste_auteur", $data);
    }
    public function action_affiche_auteur()
    {
        if (isset($_POST['auteur'])) {
            $auteur = explode(" ", $_POST['auteur']);
            $m = Model::get_model();
            $data = ["affiche_auteur" => $m->get_affiche_auteur(["Nom_auteur" => $auteur[0], "Prenom_auteur" => $auteur[1]]), "auteur" => $m->get_liste_auteur(), "position" => 2];
            $this->render("liste_auteur", $data);
        } else {
            $this->render("liste_auteur", ["position" => 1]);
        }
    }

    // ajouter un livre a la bdd
    public function action_insert_livre()
    {
        if (isset($_POST['sublivre'])) {
            $m = Model::get_model();
            $m->get_insert_livre();
            $data = ["livres" => $m->get_all_livres()];
            $this->render("all_livres", $data);

        } else {
            $this->render("insert_livre");
        }
    }
}

?>