// Fichier exemple.js

function validerDateOfBirth() {
    var inputDate = new Date(document.getElementById("dateNaissance").value);
    var today = new Date();

    if (inputDate >= today) {
        alert("La date de naissance doit être antérieure à la date d'aujourd'hui.");
    }
}

document.getElementById("submitButton").addEventListener("click", validerDateOfBirth);
document.getElementById("inscriptionForm").addEventListener("submit", function(event) {
    event.preventDefault(); // Empêche le formulaire de se soumettre normalement

    var nom = document.getElementById("nom").value;
    var prenom = document.getElementById("prenom").value;
    var telephone = document.getElementById("telephone").value;
    var dateNaissance = new Date(document.getElementById("dateNaissance").value);
    var password = document.getElementById("password").value;

    // Validation des champs du formulaire

    // Affichage des messages d'erreur ou de succès dans les lignes de champ concernées
});

document.getElementById("email").addEventListener("keyup", function() {
    var email = document.getElementById("email").value;

    if (email.includes("@esprit.tn")) {
        document.getElementById("emailMessage").innerText = "Email valide";
        document.getElementById("emailMessage").style.color = "green";
    } else {
        document.getElementById("emailMessage").innerText = "Email non valide";
        document.getElementById("emailMessage").style.color = "red";
    }
});
