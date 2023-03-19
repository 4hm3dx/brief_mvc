<?php

class Controller_commande extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_all_commandes()
    {
        $m = Model::get_model();
        $data = ["commande" => $m->get_all_commandes()];
        $this->render("all_commandes", $data);
    }

    // Affichage commande par titre
    public function action_affiche_ctitre()
    {
        $m = Model::get_model();
        $data = ["actitre" => $m->get_affiche_ctitre(), "position" => 1];
        $this->render("affiche_ctitre", $data);
    }


    public function action_all_ctitre()
    {
        $id = $_POST['actitre'];
        if (isset($_POST['actitre'])) {

            $m = Model::get_model();
            $data = ["tabtitre" => $m->get_all_ctitre($id), "actitre" => $m->get_affiche_ctitre(), "position" => 2];
            $this->render("affiche_ctitre", $data);
        } else {
            $this->render("affiche_ctitre", ["position" => 1]);
        }
    }


    // affichage commande par fournisseur
    public function action_affiche_cfournisseur()
    {
        $m = Model::get_model();
        $data = ["acfournisseur" => $m->get_affiche_cfournisseur(), "position" => 1];
        $this->render("affiche_cfournisseur", $data);
    }

    public function action_all_cafournisseur()
    {
        $id = $_POST['acfournisseur'];
        if (isset($_POST['acfournisseur'])) {

            $m = Model::get_model();
            $data = ["tabfournisseur" => $m->get_all_cafournisseur($id), "acfournisseur" => $m->get_affiche_cfournisseur(), "position" => 2];
            $this->render("affiche_cfournisseur", $data);
        } else {
            $this->render("affiche_cfournisseur", ["position" => 1]);
        }
    }

    // affichage par date
    public function action_affiche_cdate()
    {
        $m = Model::get_model();
        $data = ["acdate" => $m->get_affiche_cdate(), "position" => 1];
        $this->render("affiche_cdate", $data);
    }

    public function action_all_cdate()
    {
        $id = $_POST['acdate'];
        if (isset($_POST['acdate'])) {

            $m = Model::get_model();
            $data = ["tabdate" => $m->get_all_cdate($id), "acdate" => $m->get_affiche_cdate(), "position" => 2];
            $this->render("affiche_cdate", $data);
        } else {
            $this->render("affiche_cdate", ["position" => 1]);
        }
    }






    //* FORMULAIRE POUR INSERER UN FOURNISSEUR

    public function action_form_commande()
    {
        $m = Model::get_model();
        $data = ["livre" => $m->get_all_clivre(), "fournisseur" => $m->get_all_cfournisseur()];
        $this->render("form_commande", $data);
    }

    public function action_insert_commande()
    {
        if (isset($_POST['subcommande'])) {
            $m = Model::get_model();
            $m->get_insert_commande();
            $data = ["commande" => $m->get_all_commandes()];
            $this->render("all_commandes", $data);

        } else {
            $this->render("form_commande");
        }
    }



}

?>