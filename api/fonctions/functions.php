<?php
function seConnecter($identifiant, $motDePasse)
{
    if ($identifiant != '' && $motDePasse != '') {
        if ($identifiant == '@AEBM' && $motDePasse == '@aebm') {
            echo 'connexion réussie. <a href="html/accueil.html?identifiant=' . $identifiant . '">Acceder</a>';
        } else {
            echo 'identifiant et mot de passe incorrects';
        }
    }
}

function menu($identifiant)
{
    echo '<li><a href="accueil.html?identifiant=' . $identifiant . '">ACCUEIL</a></li>';
    echo '<li><a href="./formation.html?identifiant=' . $identifiant . '">FORMATION</a></li>';
    echo '<li><a href="apprenant.html?identifiant=' . $identifiant . '">APPRENANT</a></li>';
    echo '<li><a href="paiement.html?identifiant=' . $identifiant . '">PAIEMENT</a></li>';
    echo '<li><a href="../index.html">DECONNEXION</a></li>';
}

function lienPannel($identifiant)
{
    echo '<a href="html/accueil.html?identifiant=' . $identifiant . '">accueil</a>';
}

function identifiant($identifiant)
{
    echo '<a href="#"title="">' . $identifiant . '</a>';
}

function enregistrerFormation($nom, $duree, $cout, $identifiant)
{
    $connexion = mysqli_connect('localhost', 'root', '', 'eglise_app') or die('KO');
    if ($nom != '' && $duree != '' && $cout != '') {
        $formation = mysqli_query($connexion, 'SELECT *
                                                FROM formation
                                                WHERE nom = "' . $nom . '"');
        if (mysqli_num_rows($formation) == 0) {
            if (mysqli_query($connexion, 'INSERT INTO formation VALUES ("", "' . $nom . '", "' . $duree . '", "' . $cout . '")')) {
                $formation = mysqli_query($connexion, 'SELECT *
                                                        FROM formation
                                                        WHERE nom = "' . $nom . '"');
                if (mysqli_num_rows($formation) == 1) {
                    if ($formation = mysqli_fetch_array($formation)) {
                        echo '<span style="color: green;">Formation enregistrée avec succès!</span>';
                        echo '<br>Nom: ' . htmlspecialchars($nom);
                        echo '<br>Durée: ' . htmlspecialchars($duree) . ' heures';
                        echo '<br>Coût: ' . number_format($cout, 0, ',', ' ') . ' FC';
                        echo '<br><a href="formation.html?identifiant=' . $identifiant . '">Retour</a>';
                    }
                }
            } else {
                echo '<span style="color: red;">Formation non enregistrée</span>';
            }
        } else {
            echo '<span style="color: red;">Formation déjà enregistrée</span>';
        }
    } else {
        echo '<span style="color: red;">Erreur: tous les champs sont obligatoires</span>';
    }
    mysqli_close($connexion);
}

function lister($identifiant)
{
    $connexion = mysqli_connect('localhost', 'root', '', 'eglise_app') or die('KO');

    $formations = mysqli_query(
        $connexion,
        'SELECT *
         FROM formation
         ORDER BY nom ASC'
    );

    while ($formation = mysqli_fetch_assoc($formations)) {
?>
        <tr>
            <td>
                <a href="voirformation.html?identifiant=<?php echo $identifiant; ?>&idFormation=<?php echo $formation['id']; ?>">
                    <?php echo $formation['nom']; ?>
                </a>
            </td>
            <td><?php echo $formation['duree']; ?></td>
            <td><?php echo $formation['cout']; ?></td>
        </tr>
<?php
    }
}
