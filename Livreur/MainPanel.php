<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

     <!--GOOGLE FONT START-->
     <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Inconsolata:wght@300;400;600;800;900&family=Libre+Barcode+128+Text&family=Montserrat:wght@300;400;600&family=Open+Sans:wght@300;400;500&family=Poppins:wght@200;300;400;600&family=Righteous&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet">
    <!--GOOGLE FONT END-->
</head>
<body>
<?php
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}else{
    include "header.html";
    if(isset($_GET['req'])){
        if($_GET['req']=='MyCommands'){
            include 'LivreurViews/V@MyCommands.php';
        }else if($_GET['req']=='MyAccount'){
            include 'LivreurViews/V@MyAccount.php';
        }
        else{
            include 'LivreurViews/V@Commands.php';
        }
    }else{
        include 'LivreurViews/V@Commands.php';
    }

}?>
</body>
</html>