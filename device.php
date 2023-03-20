<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Device Information</title>
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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand" href="#">Web IT equipment repair notification system</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                <ul class="navbar-nav ">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="adminpage.php">Home Admin</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managemembers.php">Manage members</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="manage_repairrequests.php">Manage repair requests</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="device.php">Manage devices</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="managerepairman.php">Manage repairman</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-outline-primary" href="adminlogin.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <h1 class="mt-5 mb-3">Manage Device</h1>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col">
                <!-- <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h1 class="text-center mb-0">ค้นหาข้อมูลอุปกรณ์</h1>
                    </div>
                    <div class="card-body">
                        <form action="device.php" method="post">
                            <?php
                            require('dataconnect.php'); // เชื่อมต่อกับฐานข้อมูล
                            $selectedDeviceType = ""; // ประกาศตัวแปรและกำหนดค่าเริ่มต้นให้กับมัน
                            if(isset($_POST["DeviceType"])) { // ตรวจสอบว่าแบบฟอร์มถูกส่งหรือไม่
                                $selectedDeviceType = $_POST["DeviceType"]; // กำหนดค่าของประเภทอุปกรณ์ที่เลือกให้กับตัวแปร
                            }
                            $query = "SELECT DISTINCT(DeviceType) FROM equipment";
                            $result = mysqli_query($conn, $query);
                        ?>
                            <div class="form-group">
                                <label for="DeviceType">ประเภทอุปกรณ์:</label>
                                <select class="form-control" id="DeviceType" name="DeviceType" required>
                                    <option value=""></option>
                                    <?php while($row = mysqli_fetch_assoc($result)) { ?>
                                    <option value="<?php echo $row['DeviceType']; ?>"
                                        <?php if($selectedDeviceType==$row['DeviceType']) echo "selected"; ?>>
                                        <?php echo $row['DeviceType']; ?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-2">
                                    <button type="submit" class="btn btn-primary btn-block">ค้นหา</button>
                                </div>
                                <div class="col-md-6">
                                    <a href="device.php" class="btn btn-secondary btn-block">แสดงอุปกรณ์ทั้งหมด</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div> -->
            </div>
        </div>
    </div>

    <table id="repair-requests-table" class="table table-responsive mt-5">
        <thead>
            <tr>
                <th scope="col">รหัสอุปกรณ์</th>
                <!-- Device ID -->
                <th scope="col">ชื่ออุปกรณ์</th>
                <!-- Device Name -->
                <th scope="col">ประเภทอุปกรณ์</th>
                <!-- Device Type -->
                <th scope="col">รุ่นอุปกรณ์</th>
                <!-- Device Model -->
                <th scope="col">หมายเลขซีเรียล</th>
                <!-- Serial Number -->
                <th scope="col">ผู้ผลิต</th>
                <!-- Manufacturer -->
                <th scope="col">วันที่ซื้อ</th>
                <!-- Date of Purchase -->
                <th scope="col">วันหมดอายุการรับประกัน</th>
                <!-- Warranty Expiration Date -->
            </tr>
        </thead>
        <tbody>
            <?php
            
            if ($conn->connect_error) {
                die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
            }
            $sql = "SELECT DeviceID, DeviceName, DeviceType, DeviceModel, SerialNumber, Manufacturer, DateOfPurchase, WarrantyExpirationDate FROM equipment";
            if($selectedDeviceType!=""){ // ตรวจสอบว่าตัวแปรมีค่าหรือไม่
                $sql.= " WHERE DeviceType='$selectedDeviceType'"; // เพิ่มเงื่อนไขในคำค้นหา
            }
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>
                        <td>" . $row["DeviceID"]. "</td>
                        <td>" . $row["DeviceName"]. "</td>
                        <td>" . $row["DeviceType"]. "</td>
                        <td>" . $row["DeviceModel"]. "</td>
                        <td>" . $row["SerialNumber"]. "</td>
                        <td>" . $row["Manufacturer"]. "</td>
                        <td>" . $row["DateOfPurchase"]. "</td>
                        <td>" . $row["WarrantyExpirationDate"]. "</td>
                    </tr>";
                }
            } else {
                echo "ไม่พบข้อมูลสำหรับประเภทอุปกรณ์ที่เลือก";
            }
    
            $totalDevicesSql = "SELECT COUNT(*) as total FROM equipment";
            $totalDevicesResult = $conn->query($totalDevicesSql);
            $totalDevices = $totalDevicesResult->fetch_assoc()["total"];
    
            $selectedDevicesSql = "SELECT COUNT(*) as selected FROM equipment WHERE DeviceType=?";
            $stmt = $conn->prepare($selectedDevicesSql);
            $stmt->bind_param("s", $selectedDeviceType);
            $stmt->execute();
            $selectedDevicesResult = $stmt->get_result();
            $selectedDevices = $selectedDevicesResult->fetch_assoc()["selected"];
            ?>

            <div class="summary mt-5">
                <?php if ($selectedDeviceType == "") { ?>
                <!-- <p>กำลังแสดงอุปกรณ์ทั้งหมด</p> -->
                <?php } else { ?>
                <p>กำลังแสดงอุปกรณ์จำนวน <?php echo $selectedDevices; ?> ประเภท <?php echo $selectedDeviceType; ?></p>
                <?php } ?>
                <!-- <p>อุปกรณ์ทั้งหมด: <?php echo $totalDevices; ?></p> -->
            </div>
            <?php
                $conn->close();
            ?>

        </tbody>
    </table>
</body>

</html>