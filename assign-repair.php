<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "data_ssc";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if(isset($_POST["admin_id"])){
    $admin_id = $_POST["admin_id"];
    $sql = "UPDATE repair_request SET admin_id = '$admin_id' WHERE request_code = '$request_code'";
    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
// $conn->close();
?>
