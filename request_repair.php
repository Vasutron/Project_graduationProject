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

    .table-responsive {
        margin-bottom: 20px;
    }

    .table th,
    .table td {
        padding: 12px;
    }

    .table thead th {
        background-color: #007BFF;
        color: white;
    }

    .table tbody tr:nth-child(even) {
        background-color: #F2F2F2;
    }
    </style>

</head>

<body>
    <?php
    include 'manu_header.php'
    ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h1 class="text-center my-4">Search Device Information</h1>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="DeviceID" class="form-label">Search Serial Number ค้นหาข้อมูลนาฬิกาของคุณ:</label>
                        <select class="form-select" id="DeviceID" name="DeviceID" onchange="this.form.submit()"
                            required>
                            <option value="">Select Serial Number</option>
                            <?php
                                require('dataconnect.php');
                                $query = "SELECT DeviceID, SerialNumber FROM equipment WHERE UserID = ".$_SESSION['UserID'];
                                $result = mysqli_query($conn, $query);
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $selected = '';
                                    if (isset($_POST['DeviceID']) && $_POST['DeviceID'] == $row['DeviceID']) {
                                    $selected = 'selected';
                                    }
                                    echo "<option value='" . $row['DeviceID'] . "' " . $selected . ">" . $row['SerialNumber'] . "</option>";
                                }
                                mysqli_close($conn);
                            ?>
                        </select>
                    </div>
                    <div class="text-center">
                        <label>กรณีไม่พบข้อมูลนาฬิกาของคุณ กรุณาเพิ่มข้อมูลเข้าสู่ระบบ</label>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <a href="addDevice.php" class="btn btn-primary">Add Watch</a>
                    </div>
                </form>

                <?php
                    $row = array(
                        'DeviceID' => '',
                        'DeviceName' => '',
                        'DeviceType' => '',
                        'DeviceModel' => '',
                        'SerialNumber' => '',
                        'Manufacturer' => '',
                        'DateOfPurchase' => '',
                        'WarrantyExpirationDate' => ''
                    );
                    if (isset($_POST["DeviceID"])) { // Check if the form has been submitted
                        require('dataconnect.php'); //connect to database
                        $query = "SELECT * FROM equipment WHERE DeviceID = '" . $_POST["DeviceID"] . "'";
                        $result = mysqli_query($conn, $query);
                        if (mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);
                        }
                        mysqli_close($conn);
                    }
                ?>

                <div class="card">
                    <div class="card-header">
                        Device Information
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <strong>Device ID:</strong>
                            <span class="float-end"><?php echo $row['DeviceID']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Device Name:</strong>
                            <span class="float-end"><?php echo $row['DeviceName']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Device Type:</strong>
                            <span class="float-end"><?php echo $row['DeviceType']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Device Model:</strong>
                            <span class="float-end"><?php echo $row['DeviceModel']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Serial Number:</strong>
                            <span class="float-end"><?php echo $row['SerialNumber']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Manufacturer:</strong>
                            <span class="float-end"><?php echo $row['Manufacturer']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Date of Purchase:</strong>
                            <span class="float-end"><?php echo $row['DateOfPurchase']; ?></span>
                        </li>
                        <li class="list-group-item">
                            <strong>Warranty Expiration Date:</strong>
                            <span class="float-end"><?php echo $row['WarrantyExpirationDate']; ?></span>
                        </li>
                    </ul>
                </div>

                <div class="form-container mt-5">
                    <h1 class="text-center my-4">Request Repair Form</h1>
                    <form id="repair-form" action="submit_repair_request.php" method="post">
                        
                        <div class="form-group">
                            <label for="DeviceID">Device ID รหัส ID อุปกรณ์:</label>
                            <select class="form-control" id="DeviceID" name="DeviceID" required>
                                <option value="">Select Device ID</option>
                                <?php
                                        require('dataconnect.php'); //connect to database
                                        $query = "SELECT DeviceID FROM equipment WHERE UserID = ".$_SESSION['UserID'];
                                        $result = mysqli_query($conn, $query);
                                        while($row = mysqli_fetch_assoc($result)){
                                        echo "<option value='".$row['DeviceID']."'>".$row['DeviceID']."</option>";
                                        }
                                        mysqli_close($conn);
                                    ?>
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label for="ProblemDetails">Problem Details รายละเอียดแจ้งซ่อม:</label>
                            <textarea class="form-control" id="ProblemDetails" name="ProblemDetails" required></textarea>
                        </div>
                        <div class="form-group" style="display:none;">
                            <label for="UserID">User ID:</label>
                            <input type="text" class="form-control" id="UserID" name="UserID"
                                value="<?php echo $_SESSION['UserID']; ?>" readonly>
                        </div>
                        <div class="form-group mt-3">
                            <label for="DeliveryDate">Delivery Date วันที่แจ้งซ่อม:</label>
                            <input type="datetime-local" class="form-control" id="DeliveryDate" name="DeliveryDate"
                                value="<?php echo date('Y-m-d\TH:i'); ?>" readonly required>
                        </div>
                        <div class="form-group mt-3">
                            <label for="EstimatedRepairDate">Estimated Repair Date วันที่จะเข้าซ่อม:</label>
                            <input type="date" class="form-control" id="EstimatedRepairDate" name="EstimatedRepairDate"
                                min="<?php echo date('Y-m-d'); ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary mt-3 mb-3 w-100">Submit</button>
                    </form>
                </div>
            </div>

            <script>
            // load equipment data into the select element
            $(document).ready(function() {
                $("#DeviceID").select2({
                    ajax: {
                        url: "get_equipment.php",
                        dataType: "json",
                        delay: 250,
                        data: function(params) {
                            return {
                                q: params.term // search term
                            };
                        },
                        processResults: function(data) {
                            return {
                                results: data
                            };
                        },
                        cache: true
                    },
                    placeholder: "Select Device ID",
                    minimumInputLength: 0
                });
            });

            // submit the form using AJAX
            $(document).on("submit", "#repair-form", function(event) {
                event.preventDefault(); // prevent the form from submitting normally
                $.ajax({
                    url: $(this).attr("action"),
                    data: $(this).serialize(), // serialize the form data
                    type: $(this).attr("method"),
                    dataType: "json",
                    success: function(response) {
                        if (response.status == "success") {
                            alert("Repair request submitted successfully!");
                            location.reload(); // reload the page
                        } else {
                            alert("Error: " + response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        alert("Error: " + error);
                    }
                });
            });
            </script>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</body>

</html>