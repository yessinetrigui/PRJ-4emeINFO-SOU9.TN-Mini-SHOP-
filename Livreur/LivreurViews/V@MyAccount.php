<?php
    if(isset($_GET['remvNote'])){
        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
        $idNote = $_GET['remvNote'];
        $req = "update notes set STATE='DONE' where idNote='$idNote';";
        $conn->query($req);
        header('location MainPanel.php?req=MyAccount');
    }
?>
<div id="app">
<main class="py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><?php echo "Bonjour Mr ".  $_SESSION['name']; ?>;</div>
                    <div class="card-body">
                    <h6>My Acc Details!</h6>
                    <blockquote class="blockquote text-center">
                    <?php 
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $id = $_SESSION['id'];
                        $req = "select * from grades where IdLivreur=$id;";
                        $Grade = $conn->query($req)->fetch_array()[1];
                        $sreq= "select count(*) from commands  where LivrasionDate is null and LivreurID='$id' group by LivreurID;";
                        $CommandeNotFin=$conn->query($sreq)->fetch_array()[0];
                        $sreq= "select count(*) from commands  where LivrasionDate is not null and LivreurID='$id' group by LivreurID;";
                        $CommandeFin=$conn->query($sreq)->fetch_array()[0];
                        if($CommandeNotFin==null){
                            $CommandeNotFin=0;
                        }
                        if($CommandeFin==null){
                            $CommandeFin=0;
                        }
                       
                        echo "<div class='alert alert-info' role='alert'>";
                        echo "<class='mb-0'> Commande Terminé: $CommandeFin -  commande en attend: $CommandeNotFin - Grade: $Grade";
                        echo "</div>";

                        $req = "select note,idNote from notes where idLiv=$id and state='pending'";
                        $notes = $conn->query($req);
                        if($notes->num_rows!=0){
                            while ($note=$notes->fetch_array()){
                                echo "<div class='alert alert-warning' role='alert'>";
                                echo "$note[0]";
                                echo "<br>";
                                echo "<a href='?req=MyAccount&remvNote=$note[1]' type='button' class='btn btn-success'>Ok</a>";
                                echo "</div>";
                            }
                        }
                    ?>
                    </blockquote>

                    </div>
                    <div class="card-body">
                    <h6>My Finished Commands!</h6>
                    <?php 
                        $id = $_SESSION['id'];
                        $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
                        $req = "select * from commands where LivreurID='$id' and LivrasionDate is not null;";
                        $res = $conn->query($req);
                        if($res->num_rows==0){
                            echo '<div class="alert alert-info" role="alert">
                            U dont Have Any Finished Commands</div>';
                        }else{
                            
                            while ($l=$res->fetch_array()){
                                if ($l[6]=="Great"){
                                    $color = "green";
                                }else if ($l[6]=="Good"){
                                    $color = "orange";
                                }
                                else{
                                    $color = "red";
                                }
                                echo"
                                <div class='card'>
                                <div class='card-header'>
                                Command ID:  $l[0] - Client ID: $l[1] : STATE:: <span style='color:$color;font-weight:bolder;'>$l[6]</span> 
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