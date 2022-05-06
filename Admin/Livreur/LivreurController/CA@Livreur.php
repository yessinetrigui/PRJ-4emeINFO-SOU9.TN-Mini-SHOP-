<?php
function AddLivreur($email,$nom,$prenom,$pn,$pass){
    $req = "insert into `user`(`email`, `nom`, `prenom`, `password`, `phone_number`, `Role`) values('$email', '$nom', '$prenom', '$pass','$pn', 'Livreur');";

    $chk ="select * from user where email='$email' or phone_number = '$pn';";
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');

    if($conn->query($chk)->num_rows!=0){
        header('location: ../LivreurViews/LivreurPanel.php?rep=FindOK');
    }else{
        if($conn->query($req)){
            header('location: ../LivreurViews/LivreurPanel.php?rep=AjoutLivOK');
            $req  ="select IdUser from user where email='$email'";
            $id = $conn->query($req)->fetch_array();
            $re2 = "INSERT INTO `grades`(`IdLivreur`, `grade`) VALUES('$id[0]', 'normal Livreur');";
            $conn->query($re2);
        }else{
            header('location: ../LivreurViews/LivreurPanel.php?rep=AjoutLivBAD');
        }
    }
    
}
function SendNoteLivreur($idLiv, $note){
    $req = "insert into notes (idLiv,note, state) values('$idLiv', '$note', 'pending');";
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    $chk ="select * from user where IdUser='$idLiv' and role='Livreur';";
    if($conn->query($chk)->num_rows==0){
        header("location: ../LivreurViews/LivreurPanel.php?rep=NoLiv_Note");
    }else{
        if($conn->query($req)){
            header("location: ../LivreurViews/LivreurPanel.php?rep=Good_Note");
        }else{
            header("location: ../LivreurViews/LivreurPanel.php?rep=ErrSq_Note");
        }
    }
    
}
function DeleteLivreur($idLiv, $m){
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');

    $req = "delete from user where email='$m'";
    if (strlen($idLiv)>0){
        $req.=" and IdUser='$idLiv';";
    }else{
        $req.=";";
    }
    
    if($conn->query($req)===TRUE){
        if($conn->affected_rows==0){
            header("location: ../LivreurViews/LivreurPanel.php?rep=NotFound_Rmv");
        }else{
            header("location: ../LivreurViews/LivreurPanel.php?rep=Good_Rmv");
        }
    }else{
        header("location: ../LivreurViews/LivreurPanel.php?rep=ErrSq_Rmv");
    }
    
    
}
if(isset($_GET['cmd'])){
    if($_GET['cmd']=="add"){
        $email = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $pn = $_POST['pn'];
        $pass = $_POST['pass'];
        AddLivreur($email,$nom,$prenom,$pn,$pass);
    }else if($_GET['cmd']=="sendNote"){
        $idLiv = $_POST['idLiv'];
        $note = $_POST['note'];
        SendNoteLivreur($idLiv, $note);
    }else if($_GET['cmd']=="delete"){
        $idLiv = $_POST['idLiv'];
        $m = $_POST['mail'];
        DeleteLivreur($idLiv, $m);
    }
}else{
    echo "error";
}