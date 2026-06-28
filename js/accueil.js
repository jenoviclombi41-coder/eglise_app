async function menu() {
    let url = new URL(window.location.href);
    let identifiant = url.searchParams.get('identifiant');
    let serveur = await fetch('../api/appels/menu.php?identifiant=' + identifiant, { method: 'GET'});
    let menu = document.getElementById('menuAdministrateur');
    menu.innerHTML = await serveur.text();
    setTimeout('menu()', 1000);
}
menu();