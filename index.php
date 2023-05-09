<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <p>Forgot your password? <a href="forgot-password.html">Click here</a>.</p>
                <p>Don't have an account? <a href="register.html">Register here</a>.</p>
                <p>For admin. <a href="adminlogin.php">Login Admin</a>.</p>
                <!-- <p>For repairmen. <a href="">Login Repairmen</a>.</p> -->
            </div>
        </div>
    </div>
    </main>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>