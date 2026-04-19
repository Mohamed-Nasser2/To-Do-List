<?php

require_once "../App.php";

if($request->check($request->get('status')) && $request->check($request->get('id'))){
    $id = $request->get('id');
    $status = $request->get('status');

    $result = $conn->prepare("select * from todo where id=:id");
    $result->bindParam(":id" , $id , PDO::PARAM_INT);
    $result->execute();

    if($result->rowCount() == 1){
        $result = $conn->prepare("update todo set status=:status where id=:id");
        $result->bindParam(":status" , $status , PDO::PARAM_STR);
        $result->bindParam(":id" , $id , PDO::PARAM_INT);
        $output = $result->execute();
        if($output){
            $session->set("success" , "status updated successfully");
            $request->redirect("../index.php");
        }else{
            $session->set("errors" , ["error while update status"]);
            $request->redirect("../index.php");
        }
    }else{
        $session->set("errors" , ["no data founded"]);
        $request->redirect("../index.php");
    }
}else{
    $request->redirect("../index.php");
}