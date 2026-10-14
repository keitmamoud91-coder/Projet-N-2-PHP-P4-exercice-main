<?php
    include 'header.php';
    include 'bdd.php';

    $bdd = connexion();
    $requete = $bdd->prepare('SELECT * FROM oeuvres WHERE id = ?');
    $id = $_GET['id'];
    $requete->execute([$id]);
    $oeuvre = $requete->fetch(PDO::FETCH_ASSOC);

    if(empty([$id])) {
       header('Location: index.php');
    }

    if(is_null($oeuvre)) {
        header('Location: index.php');
    }
?>
<article id="detail-oeuvre">
    <div id="img-oeuvre">
        <img src="<?= $oeuvre['image'] ?>" alt="<?= $oeuvre['titre'] ?>">
    </div>

    <div id="contenu-oeuvre">
        <h1><?= $oeuvre['titre'] ?></h1>
        <p class="description"><?= $oeuvre['artiste'] ?></p>
        <p class="description-complete">
           <?= $oeuvre['description'] ?>
        </p>
    </div>
</article>
<?php require 'footer.php'; ?>
