<?php
include 'header.php';

require('dataconnect.php'); //connect to database
    
$user_id = $_SESSION['UserID'];

$query = "SELECT repair_requests.*, equipment.*, status.* FROM repair_requests 
            JOIN equipment ON repair_requests.DeviceID = equipment.DeviceID 
            JOIN status ON repair_requests.StatusID = status.StatusID 
            WHERE repair_requests.UserID='$user_id'";
$result = mysqli_query($conn, $query);


    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Check Repair Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
    $(document).ready(function() {
        $('#repair-requests-table').DataTable();
    });
    </script>

    <style>
    /* Custom styles for this page */
    .form-container {
        width: 85%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    table {
        font-size: 14px;
        background-color: #fff;
        box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    thead {
        background-color: #292b2c;
        color: #fff;
        position: sticky;
        top: 0;
    }

    tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    tbody tr:hover {
        background-color: #e6f5ff;
    }
    </style>
</head>

<body>
    <?php
    include 'manu_header.php'
    ?>
    
    <main>
        <div class="container-fluid">
            <h1 class="mt-5 mb-4">Repair Requests</h1>
            <table id="repair-requests-table" class="table table-responsive mt-3">
                <thead>
                    <tr>
                        <th>Request Code</th>
                        <th>Delivery Date</th>
                        <th>Estimated Repair Date</th>
                        <th>Problem Details</th>
                        <th>Device ID</th>
                        <th>Device Name</th>
                        <th>Device Type</th>
                        <th>Model</th>
                        <th>SNumber</th>
                        <th>Manufacturer</th>
                        <th>Status</th>
                        <th>Completion Date</th>
                        <th>Estimated Price</th>
                        <th>Confirmation Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= $row['RequestCode'] ?></td>
                        <td><?= $row['DeliveryDate'] ?></td>
                        <td><?= $row['EstimatedRepairDate'] ?></td>
                        <td><?= $row['ProblemDetails'] ?></td>
                        <td><?= $row['DeviceID'] ?></td>
                        <td><?= $row['DeviceName'] ?></td>
                        <td><?= $row['DeviceType'] ?></td>
                        <td><?= $row['DeviceModel'] ?></td>
                        <td><?= $row['SerialNumber'] ?></td>
                        <td><?= $row['Manufacturer'] ?></td>
                        <td><?= $row['StatusName'] ?></td>
                        <td><?= $row['CompletionDate'] ?></td>
                        <td><?= $row['EstimatedPrice'] ?></td>
                        <td><?= $row['ConfirmationDate'] ?></td>
                        <td>
                            <?php
                            if ($row['ConfirmationStatus'] == 'Not Confirmed') { //if confirmation status is not confirmed
                                echo '<button class="btn btn-secondary disabled">Not Confirmed</button>';
                            } elseif ($row['ConfirmationStatus'] == 'Confirmed') { //if confirmation status is confirmed
                                echo '<button class="btn btn-success disabled">Confirmed</button>';
                                echo '<a href="print_request.php?request_code='.$row['RequestCode'].'" class="btn btn-secondary">Print Request</a>';
                            } else {
                                echo '<a href="confirm_repair.php?id=' . $row['RequestCode'] . '" class="btn btn-primary">Confirm</a>';
                                echo '<a href="cancel_repair.php?id=' . $row['RequestCode'] . '" class="btn btn-danger">Cancel</a>';
                            }
                        ?>
                        </td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
    <?php
    mysqli_close($conn); //close database connection
?>

    <!-- <?php
    require('dataconnect.php'); //connect to database
    // session_start();
    $user_id = $_SESSION['UserID'];

    $query = "SELECT repair_requests.*, equipment.*, status.* FROM repair_requests 
        JOIN equipment ON repair_requests.DeviceID = equipment.DeviceID 
        JOIN status ON repair_requests.StatusID = status.StatusID 
        WHERE UserID='$user_id'";

    $result = mysqli_query($conn, $query);
    ?>
    <div class="container mt-5">
        <h1>Print Repair Status/Requests</h1>
        <div class="row">
            <?php $count = 0; while ($row = mysqli_fetch_assoc($result)) { ?>
            <?php if($count == 2){ break; } ?>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Request Code: <?= $row['RequestCode'] ?></h5>
                        <p class="card-text">Delivery Date: <?= $row['DeliveryDate'] ?></p>
                        <p class="card-text">Problem Details: <?= $row['ProblemDetails'] ?></p>
                        <p class="card-text">Device Name: <?= $row['DeviceName'] ?></p>
                        <p class="card-text">Status: <?= $row['StatusName'] ?></p>
                        <a href="print_request.php?request_code=<?= $row['RequestCode'] ?>"
                            class="btn btn-primary">Print Request</a>
                    </div>
                </div>
            </div>
            <?php $count++; } ?>
        </div>
        <?php if(mysqli_num_rows($result) > 2) { ?>
        <div class="row">
            <div class="col-md-12">
                <nav aria-label="Repair Request Navigation">
                    <ul class="pagination justify-content-center">
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <?php for($i = 2; $i <= ceil(mysqli_num_rows($result)/2); $i++) { ?>
                        <li class="page-item"><a class="page-link" href="#"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item">
                            <a class="page-link" href="#">Next</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <?php } ?>
    </div> -->

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>


</body>

</html>