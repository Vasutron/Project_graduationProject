<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Manage repairman</title>
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
        width: 100%;
        margin: 0 auto;
        padding: 20px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    table {
        font-size: 14px;
        background-color: #fff;
        box-shadow: 0 6px 10px -4px rgba(0, 0, 0, 0.1);
        margin: 0 auto;
        border-radius: 10px;
        overflow: hidden;
    }

    th,
    td {
        padding: 12px 15px;
        text-align: left;
    }

    thead {
        background-color: #292b2c;
        color: #fff;
        position: sticky;
        top: 0;
    }

    tbody tr:nth-child(even) {
        background-color: #f5f5f5;
    }

    tbody tr:hover {
        background-color: #e6f5ff;
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
        <div class="container">
            <h1>Manage repairman</h1>
            <div class="row">
                <div class="col-md-12 mt-3">
                    <a href="addrepairman.php" class="btn btn-primary mb-3">Add new repairman</a>
                    <!-- <form action="searchrepairman.php" method="GET">
                        <input type="text" name="search" placeholder="Search for specific repairman">
                        <input type="submit" value="Search">
                    </form> -->
                    <table id="repair-requests-table" class="table table-responsive mt-3">
                        <thead>
                            <tr>
                                <th>RepairmanID</th>
                                <th>Name</th>
                                <th>Surname</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>Specialization</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            //connect to database
                            require('dataconnect.php');
                            //query to select all repairman and join with the specialization table to show the specializations of each repairman
                            $query = "SELECT repairman.*, GROUP_CONCAT(specialization.SpecializationName SEPARATOR ', ') AS Specialization FROM repairman JOIN repairman_specialization ON repairman.RepairmanID = repairman_specialization.RepairmanID JOIN specialization ON repairman_specialization.SpecializationID = specialization.SpecializationID GROUP BY repairman.RepairmanID";
                            $result = mysqli_query($conn, $query);
                            //loop through the results
                            while($row = mysqli_fetch_assoc($result)){
                                echo "<tr>
                                        <td>".$row['RepairmanID']."</td>
                                        <td>".$row['Name']."</td>
                                        <td>".$row['Surname']."</td>
                                        <td>".$row['Email']."</td>
                                        <td>".$row['Phone']."</td>
                                        <td>".$row['Address']."</td>
                                        <td>".$row['Specialization']."</td>
                                        <td>
                                            <a href='editrepairman.php?id=".$row['RepairmanID']."' class='btn btn-secondary mr-2'>Edit</a>
                                            <a href='deleterepairman.php?id=".$row['RepairmanID']."' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this repairman?\");'>Delete</a>
                                        </td>
                                      </tr>";
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>

</html>