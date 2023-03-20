<?php
include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Timely Repairs</title>
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
                <a class="navbar-brand" href="#">Timely Repairs : Comprehensive watch repair service</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="request_repair.php">Request Repair</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="status.php">Check Repair Status</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="repair.html">Repair Process & Warranty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="articles.php">Articles</a> 
                            <!-- // หน้าบทความ -->
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">Contact Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-primary" href="logout.php">LogOut</a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>
    <div class="jumbotron jumbotron-fluid">
        <div class="container ">
            <h1 class="display-4">Timely Repairs : Comprehensive watch repair service</h1>
            <p class="lead">เราพร้อมช่วยเหลือคุณ บริการรับซ่อมนาฬิกาครบวงจร</p>
            <hr class="my-4">
            <p>หากคุณต้องการแจ้งซ่อม โปรดคลิกปุ่ม "Request Repair" ด้านล่างนี้ เพื่อเริ่มต้น</p>
            <a class="btn btn-primary btn-lg mb-3" href="request_repair.php" role="button">Request Repair</a>
        </div>
    </div>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4">
                <div class="container col mt-2 md-0">
                    <img src="https://images.unsplash.com/photo-1586769852836-bc069f19e1b6?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=870&q=80"
                        alt="Repair Center" class="img-fluid">
                </div>
                <h2 class="mt-3">Device Information</h2>
                <p>ค้นหาข้อมูลโดยละเอียดเกี่ยวกับอุปกรณ์ประเภทต่างๆ และสถานะการซ่อมแซม</p>
                <a class="btn btn-secondary" href="device.html" role="button">Learn More</a>
            </div>
            <div class="col-md-4">
                <div class="container col mt-2 md-0">
                    <img src="https://img.freepik.com/free-photo/hand-touching-doing-mark-five-yellow-stars-black-background-best-customer-satisfaction-evaluation-good-quality-product-service_616485-33.jpg?w=900&t=st=1674031467~exp=1674032067~hmac=e776ba1740cffdafdd2e6cb675d05df68b89aeb47367a2b857df30f6ed5841ba"
                        alt="Repair Center" class="img-fluid">
                </div>
                <h2 class="mt-3">Repair Process & Warranty</h2>
                <p>ข้อมูลเติมเกี่ยวกับกระบวนการซ่อม และการรับประกัน</p>
                <a class="btn btn-secondary" href="repair.html" role="button">Learn More</a>
            </div>
            <div class="col-md-4">
                <div class="container col mt-2 md-0">
                    <img src="https://img.freepik.com/premium-photo/contact-us-customer-support-concept-wooden-cubes-with-mail-phone-email-icons-table-yellow-background_121826-1517.jpg?w=826"
                        alt="Repair Center" class="img-fluid">
                </div>
                <h2 class="mt-3">Contact Us</h2>
                <p>หากคุณต้องการความช่วยเหลือ หรือมีคำถามใด ๆ โปรดติดต่อเรา</p>
                <a class="btn btn-secondary" href="contact.html" role="button">Learn More</a>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


</body>

</html>