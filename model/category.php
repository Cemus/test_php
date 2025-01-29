<?php

function addCategory($bdd, $name):void{
    $requete = "INSERT INTO category(`name`) VALUE(?)";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $name,PDO::PARAM_STR);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateCategory($bdd, $name,$id):void{
    $requete = "UPDATE category SET `name`=? WHERE id_category=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $name,PDO::PARAM_STR);
        $req -> bind_param(2, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function deleteCategory($bdd, $id):void{
    $requete = "DELETE FROM category WHERE id_category =?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getCategoryByName($bdd, $name){
    $requete = "SELECT id_category,`name` FROM category WHERE `name`=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $name,PDO::PARAM_STR);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAllCategory($bdd):void{
    $requete = "SELECT id_category, `name` FROM category";
    try {
        $req = $bdd->prepare($requete);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


