<?php
require('dataconnect.php');
$request_code = $_GET['request_code'];
$query = "SELECT repair_requests.*, equipment.*, status.* FROM repair_requests 
    JOIN equipment ON repair_requests.DeviceID = equipment.DeviceID 
    JOIN status ON repair_requests.StatusID = status.StatusID 
    WHERE RequestCode='$request_code'";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repair Request - <?php echo $row['RequestCode']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
    /* Custom styles for this page */
    .container {
        max-width: 700px;
        margin-top: 30px;
    }

    h1 {
        font-size: 28px;
        margin-bottom: 30px;
    }

    .btn-print {
        margin-top: 30px;
    }
    </style>
</head>

<body>

    <div class="container">
        <h1>Repair Request</h1>
        <h1>ใบแจ้งซ่อม</h1>
        <table class="table">
            <tr>
                <th>Request Code</th>
                <td><?php echo $row['RequestCode']; ?></td>
            </tr>
            <tr>
                <th>Delivery Date</th>
                <td><?php echo $row['DeliveryDate']; ?></td>
            </tr>
            <tr>
                <th>Problem Details</th>
                <td><?php echo $row['ProblemDetails']; ?></td>
            </tr>
            <tr>
                <th>Device ID</th>
                <td><?php echo $row['DeviceID']; ?></td>
            </tr>
            <tr>
                <th>Device Name</th>
                <td><?php echo $row['DeviceName']; ?></td>
            </tr>
            <tr>
                <th>Device Type</th>
                <td><?php echo $row['DeviceType']; ?></td>
            </tr>
            <tr>
                <th>Device Model</th>
                <td><?php echo $row['DeviceModel']; ?></td>
            </tr>
            <tr>
                <th>Serial Number</th>
                <td><?php echo $row['SerialNumber']; ?></td>
            </tr>
            <tr>
                <th>Manufacturer</th>
                <td><?php echo $row['Manufacturer']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $row['StatusName']; ?></td>
            </tr>
            <tr>
                <th>Repairman ID</th>
                <td><?php echo $row['RepairmanID']; ?></td>
            </tr>
            <tr>
                <th>CompletionDate</th>
                <td><?php echo $row['CompletionDate']; ?></td>
            </tr>
        </table>
        <button class="btn btn-primary btn-print" onclick="window.print()">Print</button>
        <a href="status.php" class="btn btn-primary btn-print">Cancel</a>


    </div>
</body>

</html>