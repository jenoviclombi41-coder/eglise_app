<?php
require_once '../fonctions/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom = isset($_POST['nom']) ? $_POST['nom'] : '';
    $duree = isset($_POST['duree']) ? $_POST['duree'] : '';
    $cout = isset($_POST['cout']) ? $_POST['cout'] : '';
    $identifiant = isset($_GET['identifiant']) ? $_GET['identifiant'] : '';

    enregistrerFormation($nom, $duree, $cout, $identifiant);
} else {
    echo '<span style="color: red;">Erreur: méthode non autorisée</span>';
}
