async function identifiant() {
    let url = new URL(window.location.href);
    let identifiant = url.searchParams.get('identifiant');
    let reponse = await fetch('api/appels/identifiant.php?identifiant=' + identifiant, { method: 'GET'});
    let admin = document.getElementById('identifiant');
    admin.innerHTML = await serveur.text();
    setTimeout('identifiant()', 1000);
}
identifiant();