const nameError = document.getElementById('name-error');
const surnameError = document.getElementById('surname-error');
const mailError = document.getElementById('mail-error');
const passwordError = document.getElementById('password-error');
const submitError = document.getElementById('submit-error');

function validateName() {
    const name = document.getElementById('contact-name').value;

    if (name.length == 0) {
        nameError.innerHTML = "Le Nom est requis";
        return false;
    }

    if (name.length < 3) {
        nameError.innerHTML = "Nom trop court";
        return false;
    }

    if (!name.match(/^[A-Za-z]/)) {
        nameError.innerHTML = "Nom invalide";
        return false;
    }

    nameError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
}

function validateSurname() {
    const name = document.getElementById('contact-surname').value;

    if (name.length == 0) {
        surnameError.innerHTML = "Le Prénom est requis";
        return false;
    }

    if (name.length < 3) {
        surnameError.innerHTML = "Prénom trop court";
        return false;
    }

    if (!name.match(/^[A-Za-z]/)) {
        surnameError.innerHTML = "Prénom invalide";
        return false;
    }

    surnameError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
}

function validateMail() {
    const mail = document.getElementById('contact-mail').value;

    if (mail.length == 0) {
        mailError.innerHTML = 'Mail manquant';
        return false;
    }
    if (mail.length < 5) {
        mailError.innerHTML = 'Veuillez saisir un mail valide';
        return false;
    }

    if (!mail.match(/^[A-Za-z._-]\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
        mailError.innerHTML = "Mail invalide";
        return false;
    }

    mailError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
}

function validatePassword() {
    const password = document.getElementById('contact-password').value;

    if (password.length == 0) {
        passwordError.innerHTML = 'Veuillez saisir un mot de passe valide';
        return false;
    }

    if (password.length < 8) {
        passwordError.innerHTML = 'Veuillez saisir au moins 8 caractères';
        return false;
    }

    if (!password.match(/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/)) {
        passwordError.innerHTML = "Le mot de passe doit contenir au moins une lettre et un chiffre";
        return false;
    }

    passwordError.innerHTML = '<i class="fas fa-check-circle"></i>';
    return true;
}


function validateForm() {
    if (!validateName() || !validateSurname() || !validateMail() || !validatePassword()) {
        submitError.style.display = 'block';
        submitError.innerHTML = 'Veuillez vérifier vos saisies';
        setTimeout(function () { submitError.style.display = 'none'; }, 3000);
        return false;
    }
}