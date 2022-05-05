<?php

$conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
if(isset($_GET['ref'])){
    $ref = $_GET['ref'];
    $req = "delete from items where ref='$ref';";
    if($conn->query($req)===TRUE){
        echo "Already Exist";
        if($conn->affected_rows==0){
            header("location: ../StoreViews/V@delete.php?msgErr=NotFound");
        }else{
            header("location: ../StoreViews/V@delete.php?msgSucss=Good");
        }
    }else{
        header("location: ../StoreViews/V@delete.php?msgErr=ErrSq");
        echo "ADD Item Error";
    }
}