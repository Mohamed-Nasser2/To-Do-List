<?php 
require_once 'inc/header.php';
require_once 'App.php';
?>
<body>
    
    <div class="container my-3 ">    
        <div class="row d-flex justify-content-center">
               
                <div class="container mb-5 d-flex justify-content-center">
                    <div class="col-md-4">
                        <?php
                        require_once "errors/error_success.php";
                        ?>
                        <form action="handle/addToDo.php" method="post">
                        <textarea type="text" class="form-control" rows="3" name="title" id="" placeholder="enter your note here"></textarea>
                        <div class="text-center">
                            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 " >Add To Do</button>
                        </div>
                        </form>
                    </div>
                </div>
               

        </div>
        <div class="row d-flex justify-content-between">   
            <!-- all -->
            <div class="col-md-3 "> 
                <h4 class="text-white">All Notes</h4>

                
                <div class="m-2  py-3">
                    <div class="show-to-do">
                        <?php
                        $result = $conn->query("select * from todo where status='all' order by id desc");
                        $all_notes = $result->fetchAll();
                        if(count($all_notes)>0){
                            foreach($all_notes as $note){ ?>
                            <div class="alert alert-info p-2">
                                <h4 ><?php echo $note['title'] ?></h4>
                                <h5><?php echo $note['created_at'] ?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a href="edit.php?id=<?php echo $note['id'] ?>"class="btn btn-info p-1 text-white" >edit</a>
                                   
                                    <a href="handle/goto.php?status=doing&id=<?php echo $note['id'] ?>"class="btn btn-info p-1 text-white" >doing</a>
                                </div>
                            
                            </div>
                            <?php }
                        }else{ ?>
                            <div class="item">
                                <div class="alert-info text-center ">
                                 empty to do
                                </div>
                            </div>
                        <?php }
                        ?>
                            
                    
                        
                    </div>
                </div>

            </div>

            <!-- doing -->
            <div class="col-md-3 ">
            
                <h4 class="text-white">Doing</h4>

                
                <div class="m-2 py-3">
                    <div class="show-to-do">

                        <?php
                        $result = $conn->query("select * from todo where status='doing' order by id desc");
                        $doing_notes = $result->fetchAll();
                        if(count($doing_notes)>0){
                            foreach($doing_notes as $note){ ?>
                            <div class="alert alert-success p-2">
                                <h4 ><?php echo $note['title'] ?></h4>
                                <h5><?php echo $note['created_at'] ?></h5>
                                <div class="d-flex justify-content-between mt-3">
                                    <a></a>
                                    <a href="handle/goto.php?status=done&id=<?php echo $note['id'] ?>"class="btn btn-success p-1 text-white" >Done</a>
                                </div>
                            
                            </div>
                            <?php

                            }
                        }else{ ?>
                            <div class="item">
                                <div class="alert-success text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php
                        }
                        ?>
                            
                    
                        
                    </div>
                </div>
            
            </div>
           
            <!-- done -->
            <div class="col-md-3">
                <h4 class="text-white">Done</h4>

                <div class="m-2 py-3">
                    <div class="show-to-do">
                        <?php
                        $result = $conn->query("select * from todo where status='done' order by id desc");
                        $done_notes = $result->fetchAll();
                        if(count($done_notes)>0){
                            foreach($done_notes as $note){ ?>
                            <div class="alert alert-warning p-2">
                                <a href="handle/delete.php?id=<?php echo $note['id'] ?>" onclick="confirm('are your sure')"  class="remove-to-do text-dark d-flex justify-content-end " ><i class="fa fa-close" style="font-size:16px;"></i></a>                                                                
                                <h4 ><?php echo $note['title'] ?></h4>
                                <h5><?php echo $note['created_at'] ?></h5>
                        </div>
                        <?php 
                            }
                        }else{ ?>
                            <div class="item">
                                <div class="alert-warning text-center ">
                                    empty to do
                                </div>
                            </div>
                        <?php }
                        ?>
                            
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>
</html>