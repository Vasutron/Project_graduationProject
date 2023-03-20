<?php
        include 'header.php';

        include("dataconnect.php"); // นำเข้าไฟล์ dataconnect.php ที่มีการเชื่อมต่อฐานข้อมูล

        $sql = "SELECT * FROM articles ORDER BY publication_date DESC"; // สร้างคำสั่ง SQL สำหรับดึงข้อมูลบทความทั้งหมดจากฐานข้อมูล
        $result = mysqli_query($conn, $sql); // สั่งให้ PHP ดึงข้อมูลจากฐานข้อมูลด้วยคำสั่ง SQL

    ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Articles</title>
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
        width: 85%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    .article-container {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 20px;
        margin-bottom: 20px;
        background-color: #f9f9f9;
    }

    .article-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 5px;
    }

    .article-date {
        font-size: 14px;
        color: #888;
        margin-bottom: 15px;
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
    <!-- // Path: articles -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12" id="articles-container">
                <?php
            while ($row = mysqli_fetch_assoc($result)) { // วนลูปเพื่อดึงข้อมูลจากแต่ละบทความในฐานข้อมูล
            ?>
                <div class="article-container">
                    <h2 class="article-title"><?php echo $row["title"]; ?></h2>
                    <p class="article-date"><?php echo date("F d, Y", strtotime($row["publication_date"])); ?></p>
                    <p><?php echo $row["content"]; ?></p>
                    <p class="reference">Source: <a href="<?php echo $row["reference_url"]; ?>"
                            target="_blank"><?php echo $row["author"]; ?> / Source Name</a>
                    </p>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        let articles = $(".article-container");
        let itemsPerPage = 3;
        let currentPage = 1;
        let totalPages = Math.ceil(articles.length / itemsPerPage);

        function updatePagination() {
            // ซ่อนบทความทั้งหมด
            articles.hide();

            // แสดงบทความในหน้าปัจจุบัน
            for (let i = (currentPage - 1) * itemsPerPage; i < currentPage * itemsPerPage && i < articles
                .length; i++) {
                $(articles[i]).show();
            }
        }

        function createPagination() {
            let pagination = $('<ul class="pagination"></ul>');

            for (let i = 1; i <= totalPages; i++) {
                let listItem = $('<li class="page-item"></li>');
                let link = $('<a class="page-link" href="#"></a>').text(i).on('click', function(e) {
                    e.preventDefault();
                    currentPage = i;
                    updatePagination();
                });

                listItem.append(link);
                pagination.append(listItem);
            }

            $("#articles-container").after(pagination);
        }

        updatePagination();
        createPagination();
    });
    </script>


    <!-- //ส่วนท้ายของหน้า -->
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.0-alpha1/dist/js/bootstrap.min.js"></script>

</body>

</html>