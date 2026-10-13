<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') 

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

  else {
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    $artiste = htmlspecialchars($_POST['artiste']);
    $image = htmlspecialchars($_POST['image']);
   }
?>

// Ajout d'une nouvelle oeuvre dans la base de données
<?php
include 'bdd.php';
$bdd = connexion();
$requete = $bdd->prepare('INSERT INTO oeuvres (titre, description, artiste, image) VALUES (?, ?, ?, ?)');
$requete->execute([$titre, $description, $artiste, $image]);
header('Location: oeuvre.php?id=' . $bdd->lastInsertId());
?>