<?php
    function connexion() {
        return new PDO('mysql:host=localhost;dbname=artbox;charset=utf8mb4', 
        'root', '',[ PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,   // Exceptions PDO
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // fetch assoc par défaut
            PDO::ATTR_EMULATE_PREPARES => false             // vraies requêtes préparées
        ]);
    } 
?>