<?php
include 'headerAdmin.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login Admin.</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
    /* Custom styles for this page */
    .form-container {
        width: 85%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <main>
        <?php
            include 'manu_headerAD.php';
            require('dataconnect.php'); // เชื่อมต่อกับฐานข้อมูล

            // จำนวนสมาชิกทั้งหมด
            $query_total_users = "SELECT COUNT(*) as total_users FROM users";
            $result_total_users = mysqli_query($conn, $query_total_users);
            $row_total_users = mysqli_fetch_assoc($result_total_users);
            $total_users = $row_total_users['total_users'];

            // จำนวนใบสั่งซ่อมทั้งหมด
            $query_total_requests = "SELECT COUNT(*) as total_requests FROM repair_requests";
            $result_total_requests = mysqli_query($conn, $query_total_requests);
            $row_total_requests = mysqli_fetch_assoc($result_total_requests);
            $total_requests = $row_total_requests['total_requests'];

            // จำนวนช่างซ่อมทั้งหมด
            $query_total_repairman = "SELECT COUNT(*) as total_repairman FROM repairman";
            $result_total_repairman = mysqli_query($conn, $query_total_repairman);
            $row_total_repairman = mysqli_fetch_assoc($result_total_repairman);
            $total_repairman = $row_total_repairman['total_repairman'];

            // จำนวนอุปกรณ์ทั้งหมด
            $query_total_equipment = "SELECT COUNT(*) as total_equipment FROM equipment";
            $result_total_equipment = mysqli_query($conn, $query_total_equipment);
            $row_total_equipment = mysqli_fetch_assoc($result_total_equipment);
            $total_equipment = $row_total_equipment['total_equipment'];

            // แสดงผลข้อมูล
            // echo "จำนวนสมาชิกทั้งหมด: " . $total_users . "<br>";
            // echo "จำนวนใบสั่งซ่อมทั้งหมด: " . $total_requests . "<br>";
            // echo "จำนวนช่างซ่อมทั้งหมด: " . $total_repairman . "<br>";
            // echo "จำนวนอุปกรณ์ทั้งหมด: " . $total_equipment . "<br>";

            mysqli_close($conn); // ปิดการเชื่อมต่อกับฐานข้อมูล
        ?>
    </main>

    <div class="container mt-5">
        <h1 class="text-center">ระบบจัดการข้อมูลหลังบ้าน เว็บ Timely Repairs</h1>
        <hr>
        <div class="row mt-5">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">สมาชิกทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_users; ?> คน</p>
                        <a href="managemembers.php" class="btn btn-warning">จัดการสมาชิก</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">คำขอซ่อมทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_requests; ?> คำขอ</p>
                        <a href="manage_repairrequests.php" class="btn btn-warning">จัดการคำขอซ่อม</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">อุปกรณ์ทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_equipment; ?> ชิ้น</p>
                        <a href="device.php" class="btn btn-warning">จัดการอุปกรณ์</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">ช่างซ่อมทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_repairman; ?> คน</p>
                        <a href="managerepairman.php" class="btn btn-warning">จัดการข้อมูลช่างซ่อม</a>
                    </div>
                </div>
            </div>
        </div>
        <br><hr>

    </div>

    <!-- Closing main tag and other necessary tags -->
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>