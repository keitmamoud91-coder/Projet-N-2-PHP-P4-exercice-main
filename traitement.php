<?php
session_start();

$erreur = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Vérifications
    if(empty($_POST['titre'])) {
        $erreur['titre'] = "Veuillez remplir le champ titre.";
    }

    if(empty($_POST['artiste'])) {
        $erreur['artiste'] = "Veuillez remplir le champ artiste.";
    }

    if(empty($_POST['description']) || strlen($_POST['description']) < 3) {
        $erreur['description'] = "Veuillez renseigner au moins 3 caractères.";
    }

    if(empty($_POST['image']) || !filter_var($_POST['image'], FILTER_VALIDATE_URL)) {
        $erreur['image'] = "Veuillez entrer une URL valide.";
    }

    // S'il y a des erreurs → stocker + redirection
    if (!empty($erreur)) {
        $_SESSION['erreur'] = $erreur;
        $_SESSION['old'] = $_POST;
        header('Location: ajouter.php');
        exit;
    }

    // Sinon → succès
    header('Location: success.php'); // ou autre
    exit;
}
 else {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
}
?>