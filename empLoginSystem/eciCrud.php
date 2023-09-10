<?php
session_start();
include "db_conn.php";
	$user_id = $_SESSION['id'];

  $query1 = "SELECT empID FROM user_data WHERE userID = $user_id";
  $result_empID1 = mysqli_query($conn, $query1);
  $row_empID = mysqli_fetch_assoc($result_empID1);
  $emp_id = $row_empID['empID'];

$id = "";
$name = "";
$address = "";
$cnum = "";
$data = [];

if (isset($_POST['add'])) {
	$name = $_POST['name'];
	$address = $_POST['eci_address'];
	$cnum = $_POST['eci_cnum'];

	$sql = "INSERT INTO employee_ice (empID, eci_name, eci_address, eci_cnum) VALUES ('$emp_id', '$name', '$address', '$cnum')";
	mysqli_query($conn, $sql);
}

// Update record
if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$cnum = $_POST['cnum'];

	echo "Name: ".$name."<br>";
    print_r($_POST);

	/*$sql = "UPDATE employee_ice SET eci_name='$name', eci_address='$address', eci_cnum='$cnum' WHERE eci_id=$id";
	mysqli_query($conn, $sql);
	header('location: eciCrud.php');*/
}

// Delete record
if (isset($_POST['delete'])) {
	$id = $_POST['delete'];

	$sql = "DELETE FROM employee_ice WHERE eci_id=$id";
	mysqli_query($conn, $sql);
	header('location: eciCrud.php');
}

// Modal Retrieve
if (isset($_POST['editModal'])) {
	$id = $_POST['eci_id'];

	$sql = "SELECT * FROM employee_ice WHERE eci_id=$id";
	$retrieve = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($retrieve);

	header('location: eciCrud.php');
}

// Retrieve records
$sql = "SELECT * FROM employee_ice WHERE empID = '$emp_id'";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Emergency Contact Info</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/crudcss.css">
</head>
<body class="bgJPG">
	<button class="button" style="position: fixed; top: 35px; right: 30px;" href="home.php"><a href="home.php">Home</a></button>
	<div class=" container">

		<h2 style="text-align: center; font-family: bebas neue; color: white; font-size: 5.2em;">Emergency Contact Info</h2>

		<form method="post" class="form-horizontal">
			<input type="hidden" name="id" value="<?php echo $id; ?>">
			<div class="form-group col-md-10 paddeng">
				<label class="col-sm-3 control-label">Name:</label>
				<div class="col-sm-9">
					<input type="text" name="name" value="<?php echo $name; ?>" class="form-control">
				</div>
			</div>
			<div class="form-group col-md-10 paddeng">
				<label class="col-sm-3 control-label">Address:</label>
				<div class="col-sm-9">
					<input type="text" name="eci_address" value="<?php echo $address; ?>" class="form-control">
				</div>
			</div>
			<div class="form-group col-md-10 paddeng">
				<label class="col-sm-3 control-label">Contact Number:</label>
				<div class="col-sm-9">
					<input type="text" name="eci_cnum" value="<?php echo $cnum; ?>" class="form-control">
				</div>
			</div>
			<div class="form-group">
				<div class="col-sm-offset-3 col-sm-10">
					<button type="submit" name="add" class="btn btn-primary">Add</button>
					
				</div>
			</div>
		
			<br>
		</form>

		<form method="post" class="form-horizontal">
			<table class="table tabledank">

				<thead>
					<tr>
						<th>Name</th>
						<th>Address</th>
						<th>Contact Number</th>
					</tr>
				</thead>

				<tbody>
					<tr>
					<?php while ($row = mysqli_fetch_array($result)) { ?>
						<td class="col-md-3"><?php echo $row['eci_name']; ?></td>
						<td class="col-md-3"><?php echo $row['eci_address']; ?></td>
						<td class="col-md-2"><?php echo $row['eci_cnum']; ?></td>
						<td class="col-md-1">
							<!--- <a type="submit" value="<?php echo $row['eci_id']; ?>" name="id" data-target="#eci_submit" data-toggle="modal" class="btn btn-success">Edit</a> ---->
							<input type="hidden" name="eci_id" value="<?php echo $row['eci_id']; ?>">
							
							
							<button type="submit" value="<?php echo $row['eci_id']; ?>" name="delete"  class="btn btn-danger" >Delete</button>
							
							<div class="modal fade bs-example-modal-lg" id="eci_submit">
								<div class="modal-dialog modal-lg">
									<div class="modal-content col-sm-10">
										<div class="modal-header">
											<button class="close" data-dismiss="modal">&times;</button>
											<h2 class="modal-title">Edit Info</h2>
										</div>
										<div class="modal-body">
												<div class="form-group">
													<input type="text" name="name" value="<?php echo $name; ?>" class="form-control input-lg">
												</div>
												<div class="form-group">
													<input type="text" class="form-control input-lg" name="address" value="">
												</div>
												<div class="form-group">
													<input type="text" class="form-control input-lg" name="cnum" value="">
												</div>
										</div>
										<div class="modal-footer">
											<button type="submit" class="btn btn-danger" name="update">Submit</button>
											<?php echo $row['eci_id']; ?>
										</div>
									</div>
								</div>
							</div>
							
						</td>
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</form>
		
	</div>
	<!-- jQuery -->
	<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>