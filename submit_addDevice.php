<?php
session_start();
require('dataconnect.php');

// Get data from the form
$deviceid = $_POST ['DeviceID'];
$devicename = $_POST['DeviceName'];
$devicetype = $_POST['DeviceType'];
$devicemodel = $_POST['DeviceModel'];
$serialnumber = $_POST['SerialNumber'];
$manufacturer = $_POST['Manufacturer'];
$datepurchase = $_POST['DateOfPurchase'];
$warranty = $_POST['WarrantyExpirationDate'];
$UserID = $_SESSION['UserID'];

// Get the current maximum value of the primary key column
$max_key_query = mysqli_query($conn, "SELECT MAX(DeviceID) FROM equipment");
$max_key = mysqli_fetch_array($max_key_query)[0];

// Use the next value in the sequence for the new row
$deviceid = $max_key + 1;

$sql = "INSERT INTO equipment (DeviceID,DeviceName,DeviceType,DeviceModel,SerialNumber,Manufacturer,DateOfPurchase,WarrantyExpirationDate,UserID)
        VALUES ('$deviceid', '$devicename', '$devicetype', '$devicemodel', '$serialnumber', '$manufacturer', '$datepurchase', '$warranty', '$UserID')";

$query = mysqli_query($conn,$sql);

if ($query) {
    echo "<script>alert('Repair request submitted successfully.');</script>";
    header( "refresh:0.5;url=request_repair.php" );
} else {
    echo "<script>alert('Error: ');</script>";
}
$conn->close();

?>