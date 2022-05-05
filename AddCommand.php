<?php 
//profile.php?rep=newCmd
session_start();
$id = $_SESSION['id'];
$data = $_POST["DATA"];
$conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
$TN = date('Y-m-d', time());
$req = "insert into commands (`ClientID`, `CommandDetails`, `CommandDate`) values ('$id', '$data', '$TN');";

if($conn->query($req)){
    header('location: profile.php?rep=newCmd');
}else{
    header('location: profile.php?rep=ERRCmd');
}

