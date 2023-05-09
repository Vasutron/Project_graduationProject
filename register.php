<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        /* Custom styles for this page */
    </style>
</head>
<body>
    <?php
    include 'manu_header.php'
    ?>
    <div class="container mt-3">
        <h1>Register</h1>
        <form class="" action="register_REG.php" method="post">
            <div class="form-group mt-2">
                <label for="UserID ">ID:</label>
                <input type="text" class="form-control" name="UserID" id="UserID" readonly="readonly" placeholder="ระบบจะกำหนด ID อัตโนมัติ" required>
            </div>
            <div class="form-group mt-2">
                <label for="Name">Name:</label>
                <input type="text" class="form-control" name="Name" id="Name" required>
            </div>
            <div class="form-group mt-2">
                <label for="Surname">Surname:</label>
                <input type="text" class="form-control" name="Surname" id="Surname" required>
            </div>
            <div class="form-group mt-2">
                <label for="Email">Email:</label>
                    <input type="Email" class="form-control" name="Email" id="Email" required>
                </div>
                <div class="form-group mt-2">
                    <label for="Password">Password:</label>
                    <input type="Password" class="form-control" name="Password" id="Password" required>
                </div>
                <div class="form-group mt-2">
                    <label for="Phone">Phone:</label>
                    <input type="text" class="form-control" name="Phone" id="Phone" required>
                </div>
                <div class="form-group mt-2">
                    <label for="Address">Address:</label>
                    <input type="text" class="form-control" name="Address" id="Address" required>
                </div>
                
                <button type="submit" name="submit" id="submit" class="btn btn-primary mt-3">ลงทะบียน</button>
            </form>
        </div>
    </body>
    </html>
    