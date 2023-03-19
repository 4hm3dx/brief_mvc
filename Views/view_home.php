<nav>
	<i class="fa fa-book"></i>
</nav>
<section id="sect">
	<section class="consultationd">
		<h2>Consultation</h2>
		<p>Entrez vos identifiants pour vous connecter :</p>
		<form action="?controller=home&action=connexion_user" method="post">
			<table>
				<tr>
					<td><label for="">Adresse-mail</label></td>
					<td><input type="email" name="email" class="inp"></td>
				</tr>
				<tr>
					<td><label for="">Mot de passe</label></td>
					<td><input type="password" name="password" class="inp"></td>
				</tr>
			</table>
			<table>
				<tr>
					<td><input type="submit" value="Se connecter" id="inpsub" name="inpsub"></td>
					<td id="tabp"><a href="?controller=home&action=sign_up">Inscrivez-vous</a></td>
				</tr>
			</table>
		</form>
	</section>
</section>