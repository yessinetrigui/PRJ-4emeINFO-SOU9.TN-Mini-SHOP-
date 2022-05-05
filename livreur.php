<?php
session_start();
if(empty($_SESSION['mail'])){
    header('location: login.php');
}else{
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <?php include "commun/head.html" ?>
    <?php include "commun/header.php" ?>
    </html>


<?php 

}
