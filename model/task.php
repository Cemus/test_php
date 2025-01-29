<?php

function addTask($bdd, $title, $content, $createdAt, $authorId):void{
    $requete = "INSERT INTO task(title, content, create_at, id_account,`status`) VALUE(?,?,?,?,0)";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $title,PDO::PARAM_STR);
        $req -> bind_param(2, $content,PDO::PARAM_STR);
        $req -> bind_param(3, $createdAt,PDO::PARAM_STR);
        $req -> bind_param(4, $authorId,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateStatus($bdd, $status, $idTask):void{
    $requete = "UPDATE task SET `status` = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $status,PDO::PARAM_INT);
        $req -> bind_param(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateContent($bdd, $content, $idTask):void{
    $requete = "UPDATE task SET content = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $content,PDO::PARAM_STR);
        $req -> bind_param(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateTitle($bdd, $title, $idTask):void{
    $requete = "UPDATE task SET title = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $title,PDO::PARAM_STR);
        $req -> bind_param(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function deleteTask($bdd, $id):void{
    $requete = "DELETE FROM task WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getTaskByAuthor($bdd, $authorId):void{
    $requete = "SELECT `title`,content, created_at, `status` FROM task WHERE id_account = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bind_param(1, $authorId,PDO::PARAM_INT);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAllTask($bdd):void{
    $requete = "SELECT `title`,content, created_at, `status` FROM task ";
    try {
        $req = $bdd->prepare($requete);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


