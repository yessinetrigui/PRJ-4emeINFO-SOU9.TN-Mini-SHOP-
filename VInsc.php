<?php

if (isset($_POST["G"])){
    $conn = new mysqli("127.0.0.1", "root", "", "db-sou9");
    if ($conn->error){
        die("DB Error, X23");
    }
    $mail = $_POST['mail'];
    $req = "SELECT IdUser FROM user where email='$mail';";
    $res = $conn->query($req);
    if($res->num_rows==1){
        header("location: insc.php?err=EXT");
    }else{
        $mail = $_POST['mail'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $password = $_POST['password'];
        $req = "insert into user (`email`, `nom`, `prenom`, `password`,`Role`) VALUES ('$mail','$nom','$prenom','$password','client');";
        $res = $conn->query($req);
        header("location: Login.php");

            
        
    }
}else{
    echo "Error";
}