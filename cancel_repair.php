<?php
    require('dataconnect.php'); //connect to database

    if(isset($_GET['id'])){ //check if id parameter exists in URL
        $id = $_GET['id'];

        //update the repair request in the database
        $sql = "UPDATE repair_requests SET StatusID='1', RepairmanID=NULL, EstimatedPrice=NULL, CompletionDate=NULL, EstimatedRepairDate=NULL, ConfirmationStatus='Not Confirmed', ConfirmationDate=NULL WHERE RequestCode='$id'";

        if(mysqli_query($conn, $sql)){
            echo '<div class="alert alert-success" role="alert">
                  Successfully cancelled the repair request!
                </div>';
        } else {
            echo '<div class="alert alert-danger" role="alert">
                  Failed to cancel the repair request: '. mysqli_error($conn) .'
                </div>';
        }
    }

    mysqli_close($conn); //close database connection
?>

<div class="container">
    <h1 class="mt-5 mb-4">Cancel Repair Request</h1>
    <a href="status.php" class="btn btn-secondary">Back to Repair Requests</a>
</div>