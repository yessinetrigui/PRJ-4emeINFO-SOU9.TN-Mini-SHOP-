<?php
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}else{
    if($_SESSION['role']!="Admin"){
        echo "NOT FOUND 404";
    }else{
        
        ?>
<?php include "head.html";?>

<body>
<?php include "header.php";?>


   
<div id="app">
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
            <?php if(isset($_GET["view"])){
                if($_GET["view"]=='PendingCMD'){?>
                <div class="card">
                    <div class="card-header"><?php echo "Bonjour Mr ".  $_SESSION['name']; ?>;</div>
                    <div class="card-body">
                    <h6>Pending commands!</h6>
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID is null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            No Commands Waiting</div>';
                        }else{
                            while ($l=$res->fetch_array()){
                                if($l[2]==null){
                                    $liv = "Pending";
                                }else{
                                    $liv = $l[2];
                                }
                                echo "
                                <div class='card text-center'>
                                <div class='card-header'>
                                   Command ID:  $l[0]
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-title'>Client ID: $l[1]</h5>
                                    <h5 class='card-title'>Liveur ID: $liv</h5>
                                    <p class='card-text'>Command Details: $l[3]</p>
                                </div>
                                <div class='card-footer text-muted'>
                                   $l[5]
                                </div>
                                </div>
                                <br>
                                <br>
                                ";
                            }
                        }
                    ?>


                    
                </div>


                <?php }else{?>
                <div class="card">
                <div class="card-header"><?php echo "Bonjour Mr ".  $_SESSION['name']; ?>;</div>

                    <div class="card-body">
                        
                    <h6>Finished commands!</h6>
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID is not null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            No Commands Waiting</div>';
                        }else{
                            while ($l=$res->fetch_array()){
                                if($l[2]==null){
                                    $liv = "Pending";
                                }else{
                                    $liv = $l[2];
                                }
                                echo "
                                <div class='card text-center'>
                                <div class='card-header'>
                                   Command ID:  $l[0] - STATE $l[6]
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-title'>Client ID: $l[1]</h5>
                                    <h5 class='card-title'>Liveur ID: $liv</h5>
                                    <p class='card-text'>Command Details: $l[3]</p>
                                </div>
                                <div class='card-footer text-muted'>
                                   $l[5]
                                </div>
                                </div>
                                <br>
                                <br>
                                ";
                            }
                        }
                    ?>


                    
                </div>
            <?php }}else{?>
                <div id="app">
                <main class="py-4">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-header"><?php echo "Bonjour Mr ".  $_SESSION['name']; ?>;</div>
                                    <a href="?view=PendingCMD" type="button" class="btn btn-secondary">Show Pending Command</a>
                                    <br>
                                    <a href="?view=Finished" type="button" class="btn btn-secondary">Show Finished Command</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                </div>
            <?php
                }?>
            </div>
        </div>
    </div>
</main>
</div>
</body>
</html>



    
    <?php
    }}
   


?>