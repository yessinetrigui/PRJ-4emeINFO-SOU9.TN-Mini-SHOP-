<?php

$conn = new mysqli('127.0.0.1', 'root', '', 'db-sou9');
if(isset($_POST['ref'])){
    $ref = $_POST['ref'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $unit = $_POST['unit'];
    $qte = $_POST['qte'];
    $type = $_POST['type'];
    //$pic_path = $_POST['pic_path'];
    $pic_path = $_FILES["choosefile"]["name"];
    $tempname = $_FILES["choosefile"]["tmp_name"];
    //echo $tempname;
   // echo "<br>";
    $folder = "../../../src/storepics/".$pic_path;
    //echo $folder;
    //echo "<br>";

    if (!move_uploaded_file($tempname, $folder)) {

        header("location: ../StoreViews/V@add.php?msgErr=ImgErr");

    }else{

        $req = "insert into items values('$ref','$name','$price','$qte','$pic_path','$type','$unit');";
    
        $Creq = "select * from items where ref='$ref';";
        if($conn->query($Creq)->num_rows!=0){
            echo "Already Exist";
            header("location: ../StoreViews/V@add.php?msgErr=F_1");
        }else{
            if($conn->query($req)===TRUE){
                echo "Item Added Succefully";
            header("location: ../StoreViews/V@add.php?msgSucc=Good");

            }else{
                echo "ADD Item Error";
                header("location: ../StoreViews/V@add.php?msgErr=ErrSq");

            }
        }

    }
//echo $msg;
//echo "<br>";

    
}