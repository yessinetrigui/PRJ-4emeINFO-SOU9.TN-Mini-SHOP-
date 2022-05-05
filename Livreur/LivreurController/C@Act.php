<?php
session_start();
if(isset($_GET['cmd'])){
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    if($_GET['cmd']=='DONE'){
        if(isset($_GET['idcmd'])){
            $idcmd = $_GET['idcmd'];
            $idLiv = $_SESSION['id'];
            Done_Command($idcmd, $idLiv,$conn);
        }else{
            echo "ERROR";
        }
    }
}else{
    echo "ERROR";
}
function updateGrade($conn){
    $id = $_SESSION['id'];
    $req = "select * from grades where IdLivreur='$id';";
    $l2 = $conn->query($req)->fetch_array();
    $Details = $l2[2];
    $Min = substr_count($Details, '-');
    $Max = substr_count($Details, '+');
    if($Min==$Max){
        $NewGrade= "Stable Seller";
    }else if($Min>=$Max){
        $NewGrade= "Bad Seller(karkar)";
    }else{
        $NewGrade= "Great Seller";
    }
    $req= "update grades set grade='$NewGrade' where IdLivreur='$id';";
    $conn->query($req);
}
function updateGradeDetails($conn, $ST){
    $id = $_SESSION['id'];
    $req = "select * from grades where IdLivreur='$id';";
    $l2 = $conn->query($req)->fetch_array();
    if($l2[2]==null){
        $req= "update grades set details='$ST' where IdLivreur='$id';";
        $conn->query($req);
    }else{
        $oldDetails = $l2[2];
        $oldDetails .= $ST;
        $req= "update grades set details='$oldDetails' where IdLivreur='$id';";
        $conn->query($req);
    }
}
function Done_Command($idcmd, $idLiv,$conn){
    $TN = date('Y-m-d', time());
    $T = time();
    $res = $conn->query("select CommandDate from commands where commandID='$idcmd';");
    $DT = $res->fetch_array();
    $TC = strtotime($DT[0]);
    $Formul =(int) (($T-$TC)/86400);
    if($Formul<=1){
        $State = "Great";
        updateGradeDetails($conn, "+");
    }else if($Formul<=2){
        $State = "Good";
    }else{
        $State = "BAD";
        updateGradeDetails($conn, "-");
    }
    updateGrade($conn);
    $req = "update commands set LivrasionDate='$TN',STATE='$State' where commandID = '$idcmd' and LivreurID= '$idLiv';";
    $conn->query($req);
    header("location: ../MainPanel.php?req=MyCommands");
}