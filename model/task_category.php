<?php

function getTaskByCategory(PDO $bdd,string $category):void{
    $requete = "SELECT tc.id_category, tc.id_task, t.title, t.content, t.status, t.id_account, t.created_at
                FROM task_category as tc
                JOIN task as t
                ON t.id_task = tc.id_task
                WHERE tc.id_category = ?
                ORDER BY t.created_at DESC";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $category,PDO::PARAM_INT);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}

function getTaskById(PDO $bdd,int  $id):void{
    $requete = "SELECT tc.id_category, tc.id_task, t.title, t.content, t.status, t.id_account, t.created_at
                FROM task_category as tc
                JOIN task as t
                ON t.id_task = tc.id_task
                WHERE tc.id_task = ?
                ORDER BY t.created_at DESC";
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

function addCategoryToTask(PDO $bdd,string $category,int  $idTask):void{
    $requete = "UPDATE task_category SET id_task=? WHERE id_category=?";
    try {
        $req = $bdd->prepare($requete);
        $req -> bindParam(1, $idTask,PDO::PARAM_INT);
        $req -> bindParam(2, $category,PDO::PARAM_INT);
        $req -> execute();
        $data = $req->fetch(PDO::FETCH_ASSOC);
        return $data;
    } catch (\Throwable $th){
        echo $th->getMessage();
    }
}
