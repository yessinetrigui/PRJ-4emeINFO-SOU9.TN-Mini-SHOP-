<?php
session_start();
if(isset($_GET['idcmd'])){
    $idcmd = $_GET['idcmd'];
    $idliv = $_SESSION['id'];
    $req = "update commands set LivreurID = $idliv where commandID=$idcmd";
    $conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
    $conn->query($req);
    header('location: ../MainPanel.php');
}