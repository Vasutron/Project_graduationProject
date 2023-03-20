<?php
session_start(); //start session to save admin id

require('dataconnect.php'); //connect to database

if(isset($_POST['username']) && isset($_POST['password'])){ // check if the form is submitted
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // prepare and bind sql statement to prevent SQL injection
    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE Name = ? AND Password = ?");
    mysqli_stmt_bind_param($stmt, "ss", $user, $pass);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) == 1){ // if there is a match,
        $row = mysqli_fetch_assoc($result);
        $_SESSION['UserID'] = $row['UserID']; // save admin id in session
        // $_SESSION['Email'] = $row['email']; // save admin email in session
        header("Location: home.php"); // redirect to adminpage
    }else{
        echo "<script>alert('Login Error! Please try again or check your login credentials. เข้าสู่ระบบผิดพลาด!  โปรดลองอีกครั้ง หรือตรวจสอบข้อมูล Username และ Password ก่อนยืนยันการเข้าสู่ระบบของคุณ');</script>";
         // if not match, display error message
        
        header( "refresh:0.5;url=index.html" ); // redirect back to login page after 3 seconds
    }
}
?>