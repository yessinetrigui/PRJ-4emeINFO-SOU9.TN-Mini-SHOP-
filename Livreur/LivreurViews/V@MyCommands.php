<?php

?>
<div id="app">
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo "Bonjour Mr ".  $_SESSION['name']; ?>;</div>
                    <div class="card-body">
                    <h6>My Commands!</h6>
                    <?php 
                        $id = $_SESSION['id'];
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID='$id' and LivrasionDate is null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            U dont Have Any Commands</div>';
                        }else{
                            
                            while ($l=$res->fetch_array()){
                                $T = time();
                                $TC = strtotime($l[5]);
                                $Formul =(int) (($T-$TC)/86400);
                                
                                if($Formul<=1){
                                    $color = "green";
                                }else if($Formul<=2){
                                    $color = "orange";
                                }else{
                                    $color = "red";
                                }
                                echo"
                                <div class='card text-center'>
                                <div style='color:$color;font-weight:bolder;' class='card-header'>
                                    Command Requested $Formul Days Ago  
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-title'>Client ID: $l[1], Command ID:  $l[0]</h5>
                                    <p class='card-text'>$l[3]</p>
                                    <a href='../Livreur/LivreurController/C@Act.php?cmd=DONE&idcmd=$l[0]' class='btn btn-success'>Done</a>
                                    <a href='#' class='btn btn-danger'>Report Problem</a>
                                </div>
                                <div class='card-footer text-muted'>
                                   $l[5]
                                </div>
                                </div>
                                </div>
                                ";
                            }
                        }
                    ?>


                    
                </div>
            </div>
        </div>
    </div>
</main>