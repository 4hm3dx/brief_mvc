<?php

class Controller_home extends Controller
{
	public function action_default()
	{
		$this->action_home();
	}

	public function action_home()
	{
		$this->render("home");
	}
	public function action_sign_up()
	{
		$this->render("sign_up");
	}

	public function action_connexion_user()
	{
		if (isset($_POST['inpsub'])) {
			$m = Model::get_model();
			$m->get_connexion_user();
			if ($m->get_connexion_user()) {
				// L'utilisateur existe dans la base de données

				// Vérifier si l'utilisateur est admin
				if ($_SESSION['admin'] == 1) {
					// L'utilisateur est admin
					// Faites quelque chose ici pour les utilisateurs admin
					header('Location: admin/?controller=home&action=home ');
				} else {
					// L'utilisateur n'est pas admin
					// Faites quelque chose ici pour les utilisateurs non-admin
					header('Location: user/?controller=home&action=connexion_user');
				}

			} else {
				// L'utilisateur n'existe pas dans la base de données
				// Faites quelque chose ici pour les utilisateurs inexistants
				header('Location:?controller=home&action=home');
			}
		}
	}
}