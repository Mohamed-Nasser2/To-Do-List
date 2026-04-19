<?php

require_once "../App.php";

if($request->check($request->post('submit'))){
    $title = $request->filter($request->post('title'));

    $validation->validate("title" , $title , ["required" , "str"]);
    $errors = $validation->getError();
    // var_dump($errors);
    // die();
    if($errors != false){
        $session->set("errors",$errors);
        $request->redirect("../index.php");
    }else{
        $result=$conn->prepare("insert into todo(`title`) values (:title)");
        $result->bindParam(":title" , $title , PDO::PARAM_STR);
        $output = $result->execute();
        if($output){
            $session->set('success' , 'note inserted successfully');
            $request->redirect('../index.php');
        }
    }
}else{
    $request->redirect('../index.php');
}
