<?php

class Controller_fournisseur extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_all_fournisseurs()
    {
        $m = Model::get_model();
        $data = ["fournisseur" => $m->get_all_fournisseurs()];
        $this->render("all_fournisseurs", $data);
    }

    // trier par raison sociale
    public function action_liste_sociale()
    {
        $m = Model::get_model();
        $data = ["raison_sociale" => $m->get_liste_sociale(), "position" => 1];
        $this->render("liste_sociale", $data);
    }
    public function action_raison_sociale()
    {
        $id = $_POST['raison_sociale'];
        if (isset($_POST['raison_sociale'])) {


            $m = Model::get_model();
            $data = ["affiche_raison" => $m->get_raison_sociale(), "raison_sociale" => $m->get_liste_sociale(), "position" => 2];
            $this->render("liste_sociale", $data);
        } else {


            $this->render("raison_sociale", ["position" => 1]);
        }
    }

    public function action_liste_localite()
    {
        $m = Model::get_model();
        $data = ["localite" => $m->get_liste_localite(), "position" => 1];
        $this->render("liste_localite", $data);
    }

    public function action_affiche_localite()
    {
        $id = $_POST['localite'];
        if (isset($_POST['localite'])) {


            $m = Model::get_model();
            $data = ["affiche_localite" => $m->get_affiche_localite($id), "localite" => $m->get_liste_localite(), "position" => 2];
            $this->render("liste_localite", $data);
        } else {


            $this->render("localite", ["position" => 1]);
        }
    }

    // trier fournisseur par pays
    public function action_liste_pays()
    {
        $m = Model::get_model();
        $data = ["pays" => $m->get_liste_pays(), "position" => 1];
        $this->render("liste_pays", $data);
    }
    public function action_affiche_pays()
    {
        $id = $_POST['pays'];
        if (isset($_POST['pays'])) {


            $m = Model::get_model();
            $data = ["affiche_pays" => $m->get_affiche_pays($id), "pays" => $m->get_liste_pays(), "position" => 2];
            $this->render("liste_pays", $data);
        } else {


            $this->render("pays", ["position" => 1]);
        }
    }

    // inserer un fournisseur
    public function action_insert_fournisseur()
    {
        if (isset($_POST['subfour'])) {
            $m = Model::get_model();
            $m->get_insert_fournisseur();
            $data = ["fournisseur" => $m->get_all_fournisseurs()];
            $this->render("all_fournisseurs", $data);

        } else {
            $this->render("insert_fournisseur");
        }
    }

    public function action_delete_fournisseur()
    {
        $id = $_GET["id"];
        $m = Model::get_model();
        $m->get_delete_fournisseur($id);
        $fournisseur = $m->get_all_fournisseurs();
        $data = ["fournisseur" => $fournisseur];
        $this->render("all_fournisseurs", $data);

    }

    // recupere les donnees a modifier pour le formulaire de modification
    public function action_retrieve_fournisseur()
    {
        $id = $_GET["id"];
        $m = Model::get_model();
        $data = ['fournisseuret' => $m->get_retrieve_fournisseur($id)];
        $this->render("retrieve_fournisseur", $data);

    }
    public function action_edit_fournisseur()
    {
        if (isset($_POST['subeditf'])) {
            $m = Model::get_model();
            $m->get_edit_fournisseur();
            $data = ["fournisseur" => $m->get_all_fournisseurs()];
            $this->render("all_fournisseurs", $data);

        } else {
            $this->render("retrieve_fournisseur");
        }
    }

}

?>