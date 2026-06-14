document.addEventListener('DOMContentLoaded', function () {
    let formulaire = document.getElementById('formulairePrincipale');
    formulaire.onsubmit = async function (e) {
        e.preventDefault();
        let donnees = new FormData(formulaire);
        let reponse = await fetch('api/appels/seConnecter.php', { method: 'POST', body: donnees });
        let notification = document.getElementById("notificationsConnexion");
        notification.innerHTML = await reponse.text();
    }

});