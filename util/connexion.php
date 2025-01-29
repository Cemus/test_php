<?php
function connexion ():array {
    try {
        $bdd = new PDO("mysql:host=".URL_BDD.";
        dbname=".NAME_BDD.";
        port=".URL_PORT,
         LOGIN_BDD,
         PASSWORD_BDD);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        return ["bdd"=>$bdd, "msg"=>"Connexion réussie !"];
      } catch(PDOException $e) {
        return ["msg"=>$e->getMessage()];
      }
}
?>