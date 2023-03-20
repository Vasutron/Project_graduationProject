<?php
session_start();
if(isset($_SESSION['UserID'])){
    //echo "Welcome,ID: " . $_SESSION['UserID'];
}else{
    header("Location: index.html");
    exit();
}
?>