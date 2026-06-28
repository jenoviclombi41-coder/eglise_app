async function lister() {
    let url = new URL(window.location.href);
    let identifiant = url.searchParams.get('identifiant');
    let reponse = await fetch(
        '/eglise_app/api/appels/listerFormations.php?identifiant=' + identifiant,
        { method: 'GET' }
    );
    let liste = document.getElementById('listeFormations');
    liste.innerHTML = await reponse.text();
}

lister();