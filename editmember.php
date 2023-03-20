<?php
    require('dataconnect.php'); // connect to database

    // check if form is submitted
    if(isset($_POST['submit'])){
        // get form data
        $userid = $_GET['id'];
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        
        // update user information in database
        $stmt = $conn->prepare("UPDATE users SET Name=?, Surname=?, Email=?, Password=?, Phone=?, Address=? WHERE UserID=?");
        $stmt->bind_param("ssssssi", $name, $surname, $email, $password, $phone, $address, $userid);
        $result = $stmt->execute();
        if($result){
            // redirect to managemembers page after successful update
            header('Location: managemembers.php');
            exit;
        }
    }

    // get user information from database
    $userid = $_GET['id'];
    // Check if $userid is a valid integer
    if (!filter_var($userid, FILTER_VALIDATE_INT)) {
        echo "Invalid user ID";
        exit;
    }
    $stmt = $conn->prepare("SELECT * FROM users WHERE UserID=?");
    $stmt->bind_param("i", $userid);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit member</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    /* Custom styles for this page */
    .form-container {
        width: 50%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <a class="navbar-brand" href="#">Management page for administrators</a>
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
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container">
            <h2>Edit Member Information</h2>
            <?php
         include('dataconnect.php');
         $id=$_GET['id'];
         $sql="SELECT * FROM users WHERE UserID=$id";
         $result=mysqli_query($conn,$sql);
         $row=mysqli_fetch_assoc($result);
         ?>
            <form action="editmember.php?id=<?php echo $id;?>" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" id="name" name="name" value="<?php echo $row['Name'];?>">
                </div>
                <div class="mb-3">
                    <label for="surname" class="form-label">Surname</label>
                    <input type="text" class="form-control" id="surname" name="surname"
                        value="<?php echo $row['Surname'];?>">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                        value="<?php echo $row['Email'];?>">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password"
                        value="<?php echo $row['Password'];?>">
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $row['Phone'];?>">
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <input type="text" class="form-control" id="address" name="address"
                        value="<?php echo $row['Address'];?>">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Update</button>
            </form>
        </div>
</body>

</html>