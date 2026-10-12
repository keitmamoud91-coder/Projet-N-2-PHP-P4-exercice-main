<?php
    include 'header.php';
    include 'bdd.php';
    $bdd = connexion();
    $table = $bdd->query('SELECT * FROM oeuvres');
    $oeuvres = $table->fetchAll(PDO::FETCH_ASSOC);
?>
<div id="liste-oeuvres">
    <?php foreach($oeuvres as $oeuvre): ?>
        <article class="oeuvre">
            <a href="oeuvre.php?id=<?php echo $oeuvre['id'] ?>">
            <img src="<?php echo $oeuvre['image'] ?>" alt="<?php echo $oeuvre['titre'] ?>">
            <h2><?php echo $oeuvre['titre'] ?></h2>
            <p class="description"><?php echo $oeuvre['artiste'] ?>, <?php echo $oeuvre['description'] ?></p>
            </a>
        </article>
    <?php endforeach; ?>
</div>
