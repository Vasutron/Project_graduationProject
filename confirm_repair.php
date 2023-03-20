<?php
    session_start(); //start session
    require('dataconnect.php'); //connect to database

    if(isset($_POST['confirm'])) //check if form was submitted
    {
        $id = $_POST['id'];
        $confirmationdate = date('Y-m-d H:i:s');
        $confirmationstatus = $_POST['confirmationstatus'];

        //update the repair request in the database
        $sql = "UPDATE repair_requests SET ConfirmationStatus='$confirmationstatus', ConfirmationDate='$confirmationdate' WHERE RequestCode='$id'";

        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success" role="alert">
                  Successfully confirmed the repair request!
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                  Failed to confirm the repair request: '. mysqli_error($conn) .'
                </div>';
        }
    }

    if(isset($_GET['id'])) //check if ID parameter is set in URL
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM repair_requests WHERE RequestCode='$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Confirm Repair Request</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-5 mb-4">Confirm Repair Request</h1>
        <form method="post">
            <div class="form-group">
                <label for="id">Request Code:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['RequestCode']; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="confirmationstatus">Confirmation Status:</label>
                <select class="form-control" id="confirmationstatus" name="confirmationstatus">
                    <option value="Confirmed">Confirmed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <button type="submit" name="confirm" class="btn btn-primary">Confirm</button>
            <a href="status.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>
</html>
<?php
    mysqli_close($conn); //close database connection
?>