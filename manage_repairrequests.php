<?php
include 'headerAdmin.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage repair requests</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
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
        width: 100%;
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
    include 'manu_headerAD.php'
    ?>
    <main>
        <div class=" ">
            <br>
            <h1 class="mb-4">Manage repair requests</h1>
            <div class="row mb-3">
                <div class="col-md-6">
                    <form action="search_requests.php" method="GET">
                        <!-- <div class="input-group">
                            <select name="search_type" class="form-select">
                                <option value="RequestCode">Request Code</option>
                                <option value="DeviceID">Device ID</option>
                                <option value="DeviceName">Device Name</option>
                                <option value="UserID">User ID</option>
                                <option value="ConfirmationStatus">Status</option>
                            </select>
                            <input type="text" name="search" class="form-control"
                                placeholder="Search for specific requests">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div> -->
                    </form>
                </div>
            </div>


            <?php
                require('dataconnect.php'); // เชื่อมต่อกับฐานข้อมูล

                // จำนวนใบแจ้งซ่อมทั้งหมด
                $query_total = "SELECT COUNT(*) as total_requests FROM repair_requests";
                $result_total = mysqli_query($conn, $query_total);
                $row_total = mysqli_fetch_assoc($result_total);
                $total_requests = $row_total['total_requests'];

                // จำนวนใบแจ้งซ่อมที่รอการยืนยัน
                $query_pending = "SELECT COUNT(*) as pending_requests FROM repair_requests WHERE ConfirmationStatus = 'Pending'";
                $result_pending = mysqli_query($conn, $query_pending);
                $row_pending = mysqli_fetch_assoc($result_pending);
                $pending_requests = $row_pending['pending_requests'];

                // จำนวนใบแจ้งซ่อมที่ถูกคอมเฟิร์ม
                $query_confirmed = "SELECT COUNT(*) as confirmed_requests FROM repair_requests WHERE ConfirmationStatus = 'Confirmed'";
                $result_confirmed = mysqli_query($conn, $query_confirmed);
                $row_confirmed = mysqli_fetch_assoc($result_confirmed);
                $confirmed_requests = $row_confirmed['confirmed_requests'];

                // จำนวนใบแจ้งซ่อมที่ถูกยกเลิก
                $query_canceled = "SELECT COUNT(*) as canceled_requests FROM repair_requests WHERE ConfirmationStatus = 'Not Confirmed'";
                $result_canceled = mysqli_query($conn, $query_canceled);
                $row_canceled = mysqli_fetch_assoc($result_canceled);
                $canceled_requests = $row_canceled['canceled_requests'];

                // สรุปราคารวมทั้งหมด
                $query_total_price = "SELECT SUM(EstimatedPrice) as total_price FROM repair_requests WHERE ConfirmationStatus = 'Confirmed'";
                $result_total_price = mysqli_query($conn, $query_total_price);
                $row_total_price = mysqli_fetch_assoc($result_total_price);
                $total_price = $row_total_price['total_price'];

                // แสดงผลข้อมูล
                // echo "จำนวนใบแจ้งซ่อมทั้งหมด: " . $total_requests . "<br>";
                // echo "จำนวนใบแจ้งซ่อมที่ถูกคอมเฟิร์ม: " . $confirmed_requests . "<br>";
                // echo "จำนวนใบแจ้งซ่อมที่ถูกยกเลิก: " . $canceled_requests . "<br>";
                // echo "สรุปราคารวมทั้งหมด: " . $total_price . " บาท<br>";

                mysqli_close($conn); // ปิดการเชื่อมต่อกับฐานข้อมูล
            ?>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>จำนวนใบแจ้งซ่อมทั้งหมด</th>
                            <th>จำนวนใบแจ้งซ่อมที่ยังไม่ถูกคอมเฟิร์ม</th>
                            <th>จำนวนใบแจ้งซ่อมที่ถูกคอมเฟิร์ม</th>
                            <th>จำนวนใบแจ้งซ่อมที่ถูกยกเลิก</th>
                            <th>สรุปราคารวมทั้งหมด</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><?php echo $total_requests; ?></td>
                            <td><?php echo $pending_requests; ?></td>
                            <td><?php echo $confirmed_requests; ?></td>
                            <td><?php echo $canceled_requests; ?></td>
                            <td><?php echo number_format($total_price, 2); ?> บาท</td>
                        </tr>
                    </tbody>
                </table>
            </div>


            <table id="repair-requests-table" class="table table-responsive">
                <thead>
                    <tr>
                        <th>Request Code</th>
                        <th>Delivery Date</th>
                        <th>Estimated Repair Date</th>
                        <th>Problem Details</th>
                        <th>Device ID</th>
                        <th>Device Name</th>
                        <th>Device Type</th>
                        <th>Device Model</th>
                        <th>Serial Number</th>
                        <th>Manufacturer</th>
                        <th>User ID</th>
                        <th>Status</th>
                        <th>Repairman ID</th>
                        <th>Completion Date</th>
                        <th>Estimated Price</th>
                        <th>Confirmation Date</th>
                        <th>Confirmation Status</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                        require('dataconnect.php'); //connect to database
                        $query = "SELECT repair_requests.*, equipment.*, status.* FROM repair_requests 
                            JOIN equipment ON repair_requests.DeviceID = equipment.DeviceID 
                            JOIN status ON repair_requests.StatusID = status.StatusID";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            echo "<tr>";
                            echo '<td>'.$row['RequestCode'].'</td>';
                            echo '<td>'.$row['DeliveryDate'].'</td>';
                            echo '<td>'.$row['EstimatedRepairDate'].'</td>';
                            echo '<td>'.$row['ProblemDetails'].'</td>';
                            echo '<td>'.$row['DeviceID'].'</td>';
                            echo '<td>'.$row['DeviceName'].'</td>';
                            echo '<td>'.$row['DeviceType'].'</td>';
                            echo '<td>'.$row['DeviceModel'].'</td>';
                            echo '<td>'.$row['SerialNumber'].'</td>';
                            echo '<td>'.$row['Manufacturer'].'</td>';
                            echo '<td>'.$row['UserID'].'</td>';
                            echo '<td>'.$row['StatusName'].'</td>';
                            echo '<td>'.$row['RepairmanID'].'</td>';
                            echo '<td>'.$row['CompletionDate'].'</td>';
                            echo '<td>'.$row['EstimatedPrice'].'</td>';
                            echo '<td>'.$row['ConfirmationDate'].'</td>';
                            echo '<td>'.$row['ConfirmationStatus'].'</td>';
                            echo '<td>
                                    <a href="editRequest.php?id='.$row['RequestCode'].'" class="btn btn-secondary btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                </td>';
                            echo '<td>
                                    <a href="deleteRequest.php?id='.$row['RequestCode'].'" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Delete
                                    </a>
                                </td>';
                            echo '</tr>';
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>

</body>

</html>