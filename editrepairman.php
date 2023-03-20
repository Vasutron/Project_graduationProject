<?php
    //connect to the database
    require('dataconnect.php');

    //check if the repairman id is set in the GET request
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        
        //query to select the repairman with the specified id
        $query = "SELECT * FROM repairman WHERE RepairmanID = '$id'";
        $result = mysqli_query($conn, $query);
        $repairman = mysqli_fetch_assoc($result);

        //query to select the specializations of the repairman
        $query = "SELECT SpecializationID FROM repairman_specialization WHERE RepairmanID = '$id'";
        $result = mysqli_query($conn, $query);
        $specializations = mysqli_fetch_all($result, MYSQLI_ASSOC);
    }else{
        header("Location: managerepairman.php");
    }

    //check if the form has been submitted
    if(isset($_POST['submit'])){
        //get the form data
        $name = $_POST['name'];
        $surname = $_POST['surname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address = $_POST['address'];
        $specializations = $_POST['specializations'];

        //query to update the repairman in the database
        $query = "UPDATE repairman SET Name='$name', Surname='$surname', Email='$email', Phone='$phone', Address='$address' WHERE RepairmanID='$id'";
        $result = mysqli_query($conn, $query);

        //query to delete existing specializations for the repairman
        $query = "DELETE FROM repairman_specialization WHERE RepairmanID='$id'";
        $result = mysqli_query($conn, $query);

        //loop through the selected specializations and insert them into the repairman_specialization table
        foreach($specializations as $specialization){
            $query = "INSERT INTO repairman_specialization (RepairmanID, SpecializationID) VALUES ('$id', '$specialization')";
            $result = mysqli_query($conn, $query);
        }

        header("Location: managerepairman.php");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit repairman</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
    /* Custom styles for this page */
    .form-container {
        width: 30%;
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
                        <a class="nav-link btn btn-outline-primary" href="adminlogin.php">Logout</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container bg-secondary-subtle border border-primary-subtle">
            <div class="">
                <h1 class="col-md-12 mt-5">Edit repairman</h1>
                <form class="row g-3" action="editrepairman.php?id=<?php echo $id; ?>" method="POST">
                    <div class="form-group col-md-6 mt-5">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" name="name"
                            value="<?php echo $repairman['Name']; ?>">
                    </div>
                    <div class="form-group col-md-6 mt-5">
                        <label for="surname">Surname</label>
                        <input type="text" class="form-control" id="surname" name="surname"
                            value="<?php echo $repairman['Surname']; ?>">
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email"
                            value="<?php echo $repairman['Email']; ?>">
                    </div>
                    <div class="form-group col-md-6 mt-3">
                        <label for="phone">Phone</label>
                        <input type="text" class="form-control" id="phone" name="phone"
                            value="<?php echo $repairman['Phone']; ?>">
                    </div>
                    <div class="form-group col-md-12 mt-3">
                        <label for="address">Address</label>
                        <input type="text" class="form-control" id="address" name="address"
                            value="<?php echo $repairman['Address']; ?>">
                    </div>
                    <div class="form-group col-md-3 mt-3"> <!-- *แสดงข้อมูล SpecializationName ตามที่รับข้อมูลมาจาก RepairmanID-id  -->
                        <label for="specialization">Specializations</label>
                        <input type="text" class="form-control" id="specialization" name="specialization"
                            readonly="readonly" value="<?php $query = "SELECT SpecializationID FROM repairman_specialization WHERE RepairmanID = '$id'";
                            $result = mysqli_query($conn, $query);
                            $specializationIDs = array();
                            while($row = mysqli_fetch_assoc($result)){
                                $specializationIDs[] = $row['SpecializationID'];
                            }

                            // Get the specialization names for the selected specialization IDs
                            $query = "SELECT SpecializationName FROM specialization WHERE SpecializationID IN (" . implode(",", $specializationIDs) . ")";
                            $result = mysqli_query($conn, $query);
                            $specializationNames = array();
                            while($row = mysqli_fetch_assoc($result)){
                                $specializationNames[] = $row['SpecializationName'];
                            }

                            // Output the selected specialization names 
                            echo implode(", ", $specializationNames);
                        ?>">
                    </div>

                    <div class="form-group col-md-12 mt-3">
                        <label for="specializations">Specializations</label>
                        <?php
                        //query to select all specializations
                        $query = "SELECT * FROM specialization";
                        $result = mysqli_query($conn, $query);
                        while($row = mysqli_fetch_assoc($result)){
                            //check if the specialization is currently selected for the repairman
                            $selected = "";
                            foreach($specializations as $s){
                                if($s['SpecializationID'] == $row['SpecializationID']){
                                    $selected = "selected";
                                }
                            }
                            echo "<div class='form-check'>
                                    <input class='form-check-input' type='radio' name='specializations[]' id='specialization-".$row['SpecializationID']."' value='".$row['SpecializationID']."' ".$selected.">
                                    <label class='form-check-label' for='specialization-".$row['SpecializationID']."'>".$row['SpecializationName']."</label>
                                    </div>";
                                    }
                        ?>
                    </div>
                    <input class="p-2 col-md-6 mt-5 mb-3 btn btn-primary" type="submit" name="submit"
                        value="Save changes">
                    <a class="p-2 col-md-6 mt-5 mb-3 btn btn-outline-danger" href="managerepairman.php"
                        role="button">Cancel</a>

                </form>
            </div>
        </div>
    </main>
    <?php
    $conn->close();
    ?>

</body>

</html>