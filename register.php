<?php
  require('dataconnect.php');
  
  $userid = $_POST ['UserID'];
  $name = $_POST['Name'];
  $surname = $_POST['Surname'];
  $email = $_POST['Email'];
  $password = $_POST['Password'];
  $phone = $_POST['Phone'];
  $address = $_POST['Address'];
  

  $sql = "INSERT INTO users (UserID,Name,Surname,Email,Password,Phone,Address)
            VALUES ('$userid', '$name', '$surname', '$email', '$password', '$phone', '$address')";

  $query = mysqli_query($conn,$sql);

  if ($query){
    echo "New record created successfully";
    header("Location: index.html");
  }else{
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
$conn->close();
?>
