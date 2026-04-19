<?php
require_once 'inc/header.php';
require_once "App.php";
?>

<?php

if($request->check($request->get('id'))){
    $id = $request->get('id');
    $result = $conn->prepare("select * from todo where id=:id");
    $result->bindParam(':id' , $id , PDO::PARAM_INT);
    $result->execute();
    $note = $result->fetch(PDO::FETCH_ASSOC);
    if(count($note) > 0){ ?>
        <body class="container w-50 mt-5">
            <form action="handle/edit.php?id=<?php echo $note['id'] ?>" method="post">
                    <textarea type="text" class="form-control"  name="title" id="" placeholder="enter your note here"><?php echo $note['title'] ?></textarea>
                    <div class="text-center">
                        <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Update</button>
                    </div>  
            </form>
        </body>
    <?php }
}else{
    echo "not found";
}

?>


</html>