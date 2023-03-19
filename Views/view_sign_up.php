<nav>
    <i class="fa fa-book"></i>
</nav>
<section class="consultation">
    <form action="?controller=sign_up&action=insert_user" method="post">
        <h3>Inscription</h3>

        <label for="">Nom</label>
        <input type="text" name="nom" required onkeyup="validateName()" id="contact-name">
        <span id="name-error"></span>


        <label for="">Prenom</label>
        <input type="text" name="prenom" required onkeyup="validateSurname()" id="contact-surname">
        <span id="surname-error"></span>

        <label for="">Adresse-mail</label>
        <input type="email" name="mail" required onkeyup="validateMail()" id="contact-mail">
        <span id="mail-error"></span>

        <label for="">Mot de passe</label>
        <input type="text" name="password" required onkeyup="validatePassword()" id="contact-password">
        <span id="password-error"></span>


        <input type="submit" value="S'inscrire" name="submit" id="subup" onclick="return validateForm()">
        <span id="submit-error"></span>
        <a href="?controller=sign_up&action=home">Se connecter</a>


    </form>