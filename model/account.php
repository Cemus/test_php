<?php

function addAccount(PDO $bdd,string $firstname,string $lastname,string $email,string $password):void{
    $requete = "INSERT INTO account(firstname, lastname,email,password) VALUE(?,?,?,?)";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $firstname,PDO::PARAM_STR);
        $req -> bindParam(2, $lastname,PDO::PARAM_STR);
        $req -> bindParam(3, $email,PDO::PARAM_STR);
        $req -> bindParam(4, $password,PDO::PARAM_STR);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateAccount(PDO $bdd,int $id,array $informations):void{
    $keys = array_keys($informations);
    foreach ($keys as $key){
        try {
            $value = $informations[$key]; 
            $requete = "UPDATE account SET ". $key . "=? WHERE id_account=?";
            $req = $bdd->prepare($requete);
            $req -> bindParam(1, $value,PDO::PARAM_STR);
            $req -> bindParam(2, $id,PDO::PARAM_INT);
            $req -> execute();
        } catch (\Throwable $th){
            echo $th->getMessage();
        }
    }
}

function deleteAccount(PDO $bdd,int $id):void{
    $requete = "DELETE FROM account WHERE id_account =?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getAccountById(PDO $bdd,int $id):void{
    $requete = "SELECT id_account, firstname, lastname, email FROM account WHERE id_account=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $id,PDO::PARAM_INT);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAccountByFirstname(PDO $bdd,string $firstname):void{
    $requete = "SELECT id_account, firstname, lastname, email FROM account WHERE firstname   =?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $firstname,PDO::PARAM_STR);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getAccountByLastname(PDO $bdd,string $lastname):void{
    $requete = "SELECT id_account, firstname, lastname, email FROM account WHERE lastname=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $lastname,PDO::PARAM_STR);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAllAccount(PDO $bdd):void{
    $requete = "SELECT id_account, firstname, lastname, email FROM account";
    try {
        $req = $bdd->prepare($requete);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


