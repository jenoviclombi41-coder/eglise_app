async function lienPannel() {
    let url = new URL(window.location.href);
    let identifiant = url.searchParams.get('identifiant');
    let reponse = await fetch('api/appels/lienPannel.php?identifiant=' + identifiant, { method: 'GET'});
    let lienPannel = document.getElementById('');
    lienPannel.innerHTML = await serveur.text();
    setTimeout('lienPannel()', 1000);
}
lienPannel();