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
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Management for administrators</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
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
                            <a class="nav-link" href="">Manage repair requests</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="device.php">Manage devices</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="managerepairman.php">Manage repairman</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="managearticles.php">Manage articles</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary" href="adminlogin.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>

    <main>

        <?php
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
        <div class="row">
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">สมาชิกทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_users; ?> คน</p>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="managemembers.php" role="button">Manage
                                members</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">คำขอซ่อมทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_requests; ?> คำขอ</p>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="manage_repairrequests.php" role="button">Manage
                                repair requests</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">อุปกรณ์ทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_equipment; ?> ชิ้น</p>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="device.php" role="button">Manage devices</a>
                        </li>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body text-primary">
                        <h5 class="card-title">ช่างซ่อมทั้งหมด</h5>
                        <p class="card-text"><?php echo $total_repairman; ?> คน</p>
                        <li class="nav-item">
                            <a class="nav-link btn btn-warning" href="managerepairman.php" role="button">Manage
                                repairman</a>
                        </li>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Closing main tag and other necessary tags -->
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>