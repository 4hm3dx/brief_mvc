<?php

class Controller_sign_up extends Controller
{
    public function action_default()
    {
        $this->action_home();
    }

    public function action_home()
    {
        $this->render("home");
    }

    public function action_insert_user()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $Nom = $_POST['nom'];
            $Prenom = $_POST['prenom'];
            $Mail = $_POST['mail'];
            $Password = $_POST['password'];

            if (empty($Nom) || empty($Prenom) || empty($Mail) || empty($Password)) {
                echo 'Certains champs sont vides';
                exit;
            }

            if (!filter_var($Mail, FILTER_VALIDATE_EMAIL)) {
                echo 'Format de l\'adresse mail incorrect';
                exit;
            }

            if (!filter_var($Nom, FILTER_SANITIZE_STRING) || !filter_var($Prenom, FILTER_SANITIZE_STRING)) {
                echo 'Format du nom ou du prénom incorrect';
                exit;
            }
            // Utilisation de FILTER_UNSAFE_RAW pour les champs de mot de passe
            if (!filter_var($Password, FILTER_UNSAFE_RAW)) {
                echo 'Format du mot de passe incorrect';
                exit;
            }

            $Nom = trim(htmlspecialchars($Nom));
            $Prenom = trim(htmlspecialchars($Prenom));
            $Mail = trim($Mail);
            $Password = trim(htmlspecialchars($Password));

            $m = Model::get_model();
            $m->get_insert_user($Nom, $Prenom, $Mail, $Password);
            $this->render("home");

        } else {
            $this->render("sign_up");
        }



    }



}

?>