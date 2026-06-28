let formulaire = document.getElementById('formulaireEnregistrerformation');
formulaire.onsubmit = async function (e) {
        e.preventDefault();
        let donnees = new FormData(formulaire);
        let url = new URL(window.location.href);
        let identifiant = url.searchParams.get('identifiant');
        let reponse = await fetch('/eglise_app/api/appels/enregistrerFormation.php?identifiant=' + identifiant, { method: 'POST', body: donnees });
        let notification = document.getElementById('notificationEnregistrerFormation');
        notification.innerHTML = await reponse.text();
}

// Ajouter l'identifiant au lien
let url = new URL(window.location.href);
let identifiant = url.searchParams.get('identifiant');
let lienLister = document.getElementById('lienLister');
if (lienLister && identifiant) {
        lienLister.href = 'listerformations.html?identifiant=' + identifiant;
}