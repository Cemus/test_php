<?php

function addCategory(PDO $bdd,string $name):void{
    $requete = "INSERT INTO category(`name`) VALUE(?)";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $name,PDO::PARAM_STR);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateCategory(PDO $bdd,string $name,int$id):void{
    $requete = "UPDATE category SET `name`=? WHERE id_category=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $name,PDO::PARAM_STR);
        $req -> bindParam(2, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function deleteCategory(PDO $bdd,int $id):void{
    $requete = "DELETE FROM category WHERE id_category =?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getCategoryByName(PDO $bdd,string $name){
    $requete = "SELECT id_category,`name` FROM category WHERE `name`=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $name,PDO::PARAM_STR);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAllCategory(PDO $bdd):void{
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


