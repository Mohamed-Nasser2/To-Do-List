<?php

require_once "../App.php";

if($request->check($request->get('id'))){
    $id = $request->get('id');
    $result = $conn->prepare("select * from todo where id=:id");
    $result->bindParam(":id" , $id , PDO::PARAM_INT);
    $result->execute();
    $note = $result->fetch(PDO::FETCH_ASSOC);
    if(count($note) > 0){
        $result = $conn->prepare("delete from todo where id=:id");
        $result->bindParam(":id" , $id , PDO::PARAM_INT);
        $output = $result->execute();
        if($output){
            $session->set("success" , "task deleted success");
            $request->redirect("../index.php");
        }
    }else{
    echo "error";
    }
}else{
    echo "error 404";
}