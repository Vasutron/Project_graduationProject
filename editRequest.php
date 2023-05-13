<?php
    include 'headerAdmin.php';

    require('dataconnect.php'); //connect to database
    if(isset($_POST['update'])){
        $RequestCode = $_POST['RequestCode'];
        $DeliveryDate = $_POST['DeliveryDate'];
        $ProblemDetails = $_POST['ProblemDetails'];
        $DeviceID = $_POST['DeviceID'];
        $UserID = $_POST['UserID'];
        $StatusID = $_POST['StatusID'];
        $RepairmanID = $_POST['RepairmanID'];
        $CompletionDate = $_POST['CompletionDate'];
        $EstimatedRepairDate = $_POST['EstimatedRepairDate'];
        $EstimatedPrice = $_POST['EstimatedPrice'];
        $ConfirmationDate = $_POST['ConfirmationDate'];
        $ConfirmationStatus = $_POST['ConfirmationStatus'];

        $query = "UPDATE repair_requests SET 
            DeliveryDate='$DeliveryDate', 
            ProblemDetails='$ProblemDetails', 
            DeviceID='$DeviceID', 
            UserID='$UserID', 
            StatusID='$StatusID', 
            RepairmanID='$RepairmanID', 
            CompletionDate='$CompletionDate',
            EstimatedRepairDate='$EstimatedRepairDate', 
            EstimatedPrice='$EstimatedPrice', 
            ConfirmationDate='$ConfirmationDate', 
            ConfirmationStatus='$ConfirmationStatus' 
            WHERE RequestCode='$RequestCode'";
        $result = mysqli_query($conn, $query);

        if($result){
            header("Location: manage_repairrequests.php");
        } else {
            echo "Update failed";
        }
    } else {
        $RequestCode = $_GET['id'];
        $query = "SELECT * FROM repair_requests WHERE RequestCode='$RequestCode'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Check Repair Status</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    </header>

<body>
    <?php
    include 'manu_headerAD.php'
    ?>
    <div class="container">
        <h1 class="mt-5 mb-4">Edit Repair Request</h1>
        <?php
			require('dataconnect.php'); //connect to database
			
			if(isset($_POST['update'])) //check if form was submitted
            {
                $id = $_POST['id'];
                $status = $_POST['status'];
                $repairman = $_POST['repairman'];
                $completiondate = $_POST['completiondate'];
                $estimatedrepairdate = $_POST['estimatedrepairdate'];
                $estimatedprice = $_POST['estimatedprice'];
                // $confirmationdate = $_POST['confirmationdate'];
                // $confirmationstatus = $_POST['confirmationstatus'];
                
                //update the repair request in the database
                $sql = "UPDATE repair_requests SET StatusID='$status', RepairmanID='$repairman', CompletionDate='$completiondate', EstimatedRepairDate='$estimatedrepairdate', EstimatedPrice='$estimatedprice' WHERE RequestCode='$id'"; //, ConfirmationDate='$confirmationdate', ConfirmationStatus='$confirmationstatus'
                
                if(mysqli_query($conn, $sql)){
                    echo '<div class="alert alert-success" role="alert">
                        Successfully updated the repair request!
                        </div>';
                } else {
                    echo '<div class="alert alert-danger" role="alert">
                        Failed to update the repair request: '. mysqli_error($conn) .'
                        </div>';
                }
            }

			
			//get the repair request details from the database
		$id = $_GET['id'];
		$sql = "SELECT * FROM repair_requests WHERE RequestCode='$id'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
	?>
        <form method="post">
            <div class="form-group">
                <label for="id">Request Code:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['RequestCode']; ?>"
                    readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <?php
					//get the status options from the database
					$sql = "SELECT * FROM status";
					$result = mysqli_query($conn, $sql);
					while($status = mysqli_fetch_assoc($result)){
						echo '<option value="'.$status['StatusID'].'"';
						if($status['StatusID'] == $row['StatusID']) echo ' selected';
						echo '>'.$status['StatusName'].'</option>';
					}
				?>
                </select>
            </div>

            <div class="form-group">
                <label for="repairman">Repairman:</label>
                <select class="form-control" id="repairman" name="repairman">
                    <option value="">Select a repairman</option>
                    <?php
						//get the repairman options from the database
						$sql = "SELECT * FROM repairman";
						$result = mysqli_query($conn, $sql);
						while($repairman = mysqli_fetch_assoc($result)){
							echo '<option value="'.$repairman['RepairmanID'].'"';
							if($repairman['RepairmanID'] == $row['RepairmanID']) echo ' selected';
							echo '>'.$repairman['RepairmanID'].'</option>';
						}
					?>
                </select>
            </div>
            <div class="form-group">
                <label for="completiondate">Completion Date:</label>
                <input type="datetime-local" class="form-control" id="completiondate" name="completiondate"
                    min="<?php echo date('Y-m-d\TH:i', strtotime($row['CompletionDate'])); ?>">
            </div>

            <div class="form-group">
                <label for="estimatedrepairdate">Estimated Repair Date:</label>
                <input type="datetime-local" class="form-control" id="estimatedrepairdate" name="estimatedrepairdate"
                    min="<?php echo date('Y-m-d\TH:i', strtotime($row['EstimatedRepairDate'])); ?>">
            </div>

            <div class="form-group">
                <label for="estimatedprice">Estimated Price:</label>
                <input type="number" class="form-control " id="estimatedprice" name="estimatedprice" min="0.00"
                    value="<?php echo $row['EstimatedPrice']; ?>">
            </div>

            <button type="submit" name="update" class="btn btn-primary mt-05">Update</button>
            <a href="manage_repairrequests.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>