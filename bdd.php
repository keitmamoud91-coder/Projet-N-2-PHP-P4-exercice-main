<?php
    function connexion() {
        return new PDO('mysql:host=localhost;dbname=exercice', 'root', '');
    }
?>
