<?php

$conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
if(isset($_POST['ref']) || isset($_GET['ref'])){
    if(isset($_POST['ref'])){
        $ref = $_POST['ref'];
    }
    if(isset($_GET['ref'])){
        $ref = $_GET['ref'];
    }
    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $qte = $_POST['qte'];
    $type = $_POST['type'];
    $pic_path = $_POST['pic_path'];
    $req = "update items set
        name = '$name',
        price = '$price',
        unit = '$unit',
        qte_stock = '$qte',
        type = '$type',
        pic_path = '$pic_path'
    where ref='$ref';";
    if($conn->query($req)===TRUE){
        echo "Already Exist";
        if($conn->affected_rows==0){
            header("location: ../StoreViews/V@modify.php?msgErr=NotFound");
        }else{
            header("location: ../StoreViews/V@modify.php?msgSucss=Good");
        }
    }else{
        header("location: ../StoreViews/V@modify.php?msgErr=ErrSq");
        echo "ADD Item Error";
    }
}