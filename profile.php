
<?php
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}else{
    //echo "Bonjour ".  $_SESSION['mail'];
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "commun/head.html"; ?>
    <?php include "commun/header.php"; ?>
    <link rel="stylesheet" href="style/profile.css">
    
    <div id="BOX">
        <div class="sub-Box">
            <div class="Title-Box">
                <h1>My Commands</h1>
            </div>
            <div class="Body-Box">

                <?php
                    if(isset($_GET['rep'])){
                        if($_GET['rep']=='newCmd'){
                            echo "<div class='alert good'>New Command Added Succefully</div>";
                        }else{
                            echo "<div class='alert bad'>Command Added Error</div>";

                        }
                    }
                


                    $id = $_SESSION['id'];
                    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                    $req ="select * from commands where ClientID='$id';";
                    $res = $conn->query($req);
                    if($res->num_rows!=0){
                        while($l=$res->fetch_array()){
                            if($l[4]==null){
                                $color = 'orange';
                                $desc = 'Pending';
                            }else{
                                $color = 'Green';
                                $desc = 'Done';
                            }
                            echo "
                            <div class='item'>
                                <h1 class='title'>Command ID: $l[0] | Command Date: $l[5] <br> State: <span style='color:$color;'>$desc</span> <br> </h1>
                            </div>
                            ";
                        }
                    }else{
                        echo "
                            <div class='item'>
                                <h1 class='title'>No Commands, Go To the Store And buy now !</h1>
                            </div>
                            ";
                    }
                ?>
                
            </div>
        </div>
    </div>

<?php }