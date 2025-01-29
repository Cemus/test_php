<?php
function connexion () {
    try {
        $bdd = new PDO("mysql:host=".URL_BDD.";
        dbname=".NAME_BDD.";
        port=".URL_PORT,
         LOGIN_BDD,
         PASSWORD_BDD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Connecté sur la BDD";
        return $bdd;
      } catch(PDOException $e) {
        echo "Connexion échouée : " . $e->getMessage();
      }
}
?>