<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/css/bootstrap.min.css">

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
    <?php
    include 'manu_header.php'
    ?>

    <main>
        <div class="container py-5">
            <div class="jumbotron">
                <h1 class="display-4">Timely Repairs: Comprehensive watch repair service</h1>
                <p class="lead">เราพร้อมช่วยเหลือคุณ บริการรับซ่อมนาฬิกาครบวงจร</p>
                <hr class="my-4">
                <p>หากคุณต้องการใช้บริการ โปรดเข้าสู่ระบบด้านล่างนี้เพื่อเริ่มต้น</p>
            </div>

            <div class="form-container mt-5">
                <h1 class="text-center mb-4">Login</h1>
                <form action="login.php" method="post">
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="form-group form-check mb-3">
                        <input type="checkbox" class="form-check-input" id="remember-me" name="remember-me">
                        <label class="form-check-label" for="remember-me">Remember me</label>
                    </div>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
                <div class="mt-3 text-center">
                    <p>ลงทะเบียนสมาชิก <a href="register.php">Click here</a>.</p>

                    <p>ลืมรหัสผ่าน <a href="#" id="registrationModalLink" data-toggle="modal"
                            data-target="#registrationModal">Click here</a>.</p>

                    <!-- Modal -->
                    <div class="modal fade" id="registrationModal" tabindex="-1"
                        aria-labelledby="registrationModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="registrationModalLabel">คุณลืมรหัสผ่านใช่หรือไม่</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- เนื้อหาใน Modal -->
                                    <p>โปรดพักผ่อนเยอะ ๆ และจดจำข้อมูลส่วนบุคคลของคุณให้ได้</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <p>สำหรับผู้ดูแลระบบ <a href="adminlogin.php">Login Admin</a>.</p>
                    <!-- <p>For repairmen. <a href="">Login Repairmen</a>.</p> -->
                </div>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#registrationModalLink').click(function() {
            $('#registrationModal').modal('show');
        });
    });
    </script>
</body>

</html>