<?php

if (isset($_POST["G"])){
    $conn = new mysqli("127.0.0.1", "root", "", "db-sou9");
    if ($conn->error){
        die("DB Error, X23");
    }
    $m = $_POST["m"];
    $p = $_POST["p"];
    $req = "SELECT password,role,nom,IdUser FROM user where email='$m';";
    $res = $conn->query($req);
    if($res->num_rows==0){
        header("location: Login.php?err=XPM");
    }else{
        $l = $res->fetch_array();
        if($l["password"]===$p){
            $chk = "select * from disabledclients where idClient=$l[3];";
            $res = $conn->query($chk);
            $lc= $res->fetch_array();
            if($res->num_rows==1){
                header("location: Login.php?err=BANNED&reason=$lc[1]");
            }else{
                session_start();
                $_SESSION["mail"]=$m;
                $_SESSION["role"]=$l[1];
                $_SESSION["name"]=$l[2];
                $_SESSION["id"]=$l[3];
                header("location: dashboard.php");
            }

            
        }else{
            header("location: Login.php?err=XPass");
        }
    }
}else{
    echo "Error";
}