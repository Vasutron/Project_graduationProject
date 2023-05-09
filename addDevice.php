<?php
    include 'header.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>AddDevice</title>
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
    <div class="container mt-3">
        <h1>Add Wacth : เพิ่มข้อมูลนาฬิกาของคุณ</h1>
        <form class="" action="submit_addDevice.php" method="post">
            <div class="form-group mt-2" style="display: none;">
                <label for="DeviceID">Device ID:</label>
                <input type="text" class="form-control" name="DeviceID" id="DeviceID" readonly required>
            </div>
            <script>
            function generateRandomDeviceModel() {
                var min = 1000;
                var max = 9999;
                var randomDeviceModel = Math.floor(Math.random() * (max - min + 1)) + min;
                $('#DeviceID').val(randomDeviceModel);
            }

            $(document).ready(function() {
                generateRandomDeviceModel();
            });
            </script>
            <div class="form-group mt-2">
                <label for="DeviceName">Device Name: ชื่อรุ่น</label>
                <input type="text" class="form-control" name="DeviceName" id="DeviceName" placeholder="ชื่อรุ่นนนาฬิกา"
                    required>
            </div>
            <div class="form-group mt-2">
                <label for="SpecializationID">Device Type: ประเภท</label>
                <select class="form-control" id="SpecializationID" name="DeviceType" required>
                    <option value=""></option>
                    <option value="Analog Watch">Analog Watch</option>
                    <option value="Quartz Watch">Quartz Watch</option>
                    <option value="Digital Watch">Digital Watch</option>
                    <option value="Automatic Watch">Automatic Watch</option>
                    <option value="Diving Watch">Diving Watch</option>
                    <option value="Chronograph Watch">Chronograph Watch</option>
                    <option value="Dress Watch">Dress Watch</option>
                    <option value="Mechanical Watch">Mechanical Watch</option>
                    <option value="Smart Watch">Smart Watch</option>
                    <option value="Field Watch">Field Watch</option>
                    <option value="Pilot Watch">Pilot Watch</option>
                    <option value="Luxury Watch">Luxury Watch</option>
                </select>

            </div>
            <div class="form-group mt-2">
                <label for="DeviceModel">Device Model:</label>
                <input type="DeviceModel" class="form-control" name="DeviceModel" id="DeviceModel"
                    placeholder="รุ่นนนาฬิกา" required>
            </div>
            <div class="form-group mt-2">
                <label for="SerialNumber">Serial Number:</label>
                <input type="text" class="form-control" name="SerialNumber" id="SerialNumber"
                    placeholder="ระบุ Serial Number" required>
            </div>
            <div class="form-group mt-2">
                <label for="Manufacturer">Manufacturer: </label>
                <input type="text" class="form-control" name="Manufacturer" id="Manufacturer"
                    placeholder="ระบุบริษัทผู้ผลิต" required>
            </div>
            <div class="form-group mt-2">
                <label for="DateOfPurchase">Date of Purchase:</label>
                <input type="date" class="form-control" name="DateOfPurchase" id="DateOfPurchase" required>
            </div>
            <div class="form-group mt-2">
                <label for="WarrantyExpirationDate">Warranty Expiration Date:</label>
                <input type="date" class="form-control" name="WarrantyExpirationDate" id="WarrantyExpirationDate"
                    required>
            </div>
            <div class="form-group" style="display:none;">
                <label for="UserID">User ID:</label>
                <input type="text" class="form-control" id="UserID" name="UserID"
                    value="<?php echo $_SESSION['UserID']; ?>" readonly>
            </div>

            <button type="submit" name="submit" class="btn btn-primary mt-3">Add Wacth Data</button>
        </form>
    </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>