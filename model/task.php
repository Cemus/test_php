<?php

function addTask(PDO $bdd, string $title,string $content,string $createdAt,int $authorId):void{
    $requete = "INSERT INTO task(title, content, create_at, id_account,`status`) VALUE(?,?,?,?,0)";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $title,PDO::PARAM_STR);
        $req -> bindParam(2, $content,PDO::PARAM_STR);
        $req -> bindParam(3, $createdAt,PDO::PARAM_STR);
        $req -> bindParam(4, $authorId,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateStatus(PDO $bdd,string $status,int $idTask):void{
    $requete = "UPDATE task SET `status` = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $status,PDO::PARAM_INT);
        $req -> bindParam(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateContent(PDO $bdd,string $content,int  $idTask):void{
    $requete = "UPDATE task SET content = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $content,PDO::PARAM_STR);
        $req -> bindParam(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function updateTitle(PDO $bdd,string $title,int  $idTask):void{
    $requete = "UPDATE task SET title = ? WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $title,PDO::PARAM_STR);
        $req -> bindParam(2, $idTask,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function deleteTask(PDO $bdd,int  $id):void{
    $requete = "DELETE FROM task WHERE id_task = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $id,PDO::PARAM_INT);
        $req -> execute();
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getTaskByAuthor(PDO $bdd,int  $authorId):void{
    $requete = "SELECT `title`,content, created_at, `status` FROM task WHERE id_account = ?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $authorId,PDO::PARAM_INT);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}


function getAllTask(PDO $bdd):void{
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


