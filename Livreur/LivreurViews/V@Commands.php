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
                    <h6>Take a command !</h6>
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID is null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            No Commands Available, irj3 8odhwa!</div>';
                        }else{
                            while ($l=$res->fetch_array()){
                                echo "
                                <div class='card text-center'>
                                <div class='card-header'>
                                   Command ID:  $l[0]
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-title'>Client ID: $l[1]</h5>
                                    <p class='card-text'>$l[3]</p>
                                    <a href='LivreurController/C@TakeCommand.php?idcmd=$l[0]' class='btn btn-primary'>Take It</a>
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