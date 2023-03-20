<?php
session_start();
require('dataconnect.php');

// Get data from the form
$DeviceID = $_POST['DeviceID'];
$ProblemDetails = $_POST['ProblemDetails'];
$UserID = $_SESSION['UserID'];
$DeliveryDate = $_POST['DeliveryDate'];
$EstimatedRepairDate = $_POST['EstimatedRepairDate'];

// check if User ID is valid
$check_user = "SELECT UserID FROM users WHERE UserID = '$UserID'";
$result_check = mysqli_query($conn, $check_user);
if (mysqli_num_rows($result_check) == 0) {
    echo "Invalid User ID";
    exit();
}

// Insert data into the repair_requests table
$query = "INSERT INTO repair_requests (DeviceID, ProblemDetails, UserID, DeliveryDate, EstimatedRepairDate) VALUES ('$DeviceID', '$ProblemDetails', '$UserID', '$DeliveryDate', '$EstimatedRepairDate')";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Repair request submitted successfully.');</script>";
    header( "refresh:0.5;url=status.php" );
} else {
    echo "<script>alert('Error: ".$query." ".mysqli_error($conn)."');</script>";
}

mysqli_close($conn);
?>