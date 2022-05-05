<?php
function DisableClient($Reason,$idClient){
    $req = "insert into disabledclients values('$idClient', '$Reason');";
    $chk ="select * from user where IdUser='$idClient';";
    $chk2 ="select * from disabledclients where idClient='$idClient';";
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    if($conn->query($chk)->num_rows==0){
        header('location: ../ClientViews/ClientPanel.php?rep=NotFound');
    }else{
        if($conn->query($chk2)->num_rows!=0){
            header('location: ../ClientViews/ClientPanel.php?rep=DejaDis');

        }else{
            if($conn->query($req)){
                header('location: ../ClientViews/ClientPanel.php?rep=GoodDis');
            }else{
                header('location: ../ClientViews/ClientPanel.php?rep=NotFound');
            }
        }
        
    }
}
function EnableClient($idClient){
    $req ="delete from disabledclients where idClient='$idClient';";
    $chk ="select * from user where IdUser='$idClient';";
    $chk2 ="select * from disabledclients where idClient='$idClient';";
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    if($conn->query($chk)->num_rows==0){
        header('location: ../ClientViews/ClientPanel.php?rep=NotFound');
    }else{
        if($conn->query($chk2)->num_rows==0){
            header('location: ../ClientViews/ClientPanel.php?rep=NotFoundEnb');
        }else{
            if($conn->query($req)){
                header('location: ../ClientViews/ClientPanel.php?rep=GoodEnab');
            }else{
                header('location: ../ClientViews/ClientPanel.php?rep=NotFound');
            }
        }
    }
}
if(isset($_GET['cmd'])){
    if($_GET['cmd']=='dis'){
        $idClient = $_POST['idClient'];
        $Reason = $_POST['Reason'];
        DisableClient($Reason,$idClient);

    }else{
        $idClient = $_POST['idClient'];
        EnableClient($idClient);
    }
}
