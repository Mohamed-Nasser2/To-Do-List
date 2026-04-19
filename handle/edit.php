<?php

require_once "../App.php";

if($request->check($request->post('submit')) && $request->check($request->get('id'))){

    $id = $request->get('id');
    $title = $request->filter($request->post('title')); 

    $validation->validate('title' , $title , ["required" , "str"]);
    $errors = $validation->getError();

    if($errors != false){
        // var_dump($errors);
        $session->set("errors" , $errors);
        $request->redirect("../edit.php?id=$id");
    }else{
        $result = $conn->prepare("select * from todo where id=:id");
        $result->bindParam(":id" , $id , PDO::PARAM_INT);
        $result->execute();
        $note = $result->fetch(PDO::FETCH_ASSOC);
        if(count($note) > 0){
            $result = $conn->prepare("update todo set title=:title where id=:id");
            $result->bindParam(":title" , $title , PDO::PARAM_STR);
            $result->bindParam(":id" , $id , PDO::PARAM_INT);
            $output = $result->execute();
            if($output){
                $session->set("success" , "note update success");
                $request->redirect("../index.php");
            }else{
                $session->set("errors" , ["error while update"]);
                $request->redirect("../edit.php?id=$id");
            }
        }else{
            $session->set("errors" , $errors);
            $request->redirect("../edit.php?id=$id");
        }
    }

}else{
    $request->redirect('../index.php');
}