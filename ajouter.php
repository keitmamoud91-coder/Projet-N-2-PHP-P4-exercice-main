<?php require 'header.php'; ?>

<?php session_start();
$erreur = $_SESSION['erreur'] ?? [];
$old = $_SESSION['old'] ?? [];
unset($_SESSION['erreur'], $_SESSION['old']);
?>

<form action="traitement.php" method="POST">
    
    <div class="champ-formulaire">
        <label for="titre">Titre de l'œuvre</label>
    <input type="text" name="titre" id="titre" value="<?= $old['titre'] ?? '' ?>">
<?php if (!empty($erreur['titre'])): ?>
    <p class="erreur"><?= $erreur['titre'] ?></p>
<?php endif; ?>
    </div>

    <div class="champ-formulaire">
        <label for="artiste">Auteur de l'œuvre</label>
        <input type="text" name="artiste" id="artiste" value="<?= $old['artiste'] ?? '' ?>">
<?php if(!empty($erreur['artiste'])): ?>
    <p class="erreur"><?= $erreur['artiste'] ?></p>
<?php endif; ?>
    </div>

    <div class="champ-formulaire">
        <label for="image">URL de l'image</label>
        <input type="url" name="image" id="image" value="<?= $old['image'] ?? '' ?>">
    </div>
<?php if (!empty($erreur['image'])): ?>
    <p class="erreur"><?= $erreur['image'] ?></p>
<?php endif; ?>
    </div>

    <div class="champ-formulaire">
        <label for="description">Description</label>
        <textarea name="description" id="description"><?= $old['description'] ?? '' ?></textarea>
<?php if (!empty($erreur['description'])): ?>
    <p class="erreur"><?= $erreur['description'] ?></p>
<?php endif; ?>
    </div>

    <input type="submit" value="Valider" name="submit">
</form>
<?php require 'footer.php'; ?>
