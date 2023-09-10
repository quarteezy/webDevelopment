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

// Modal Retrieve
if (isset($_POST['editModal'])) {
	$id = $_POST['eci_id'];

	$sql = "SELECT * FROM employee_ice WHERE eci_id=$id";
	$retrieve = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($retrieve);

	header('location: eciCrud.php');
}

// Retrieve records
$search = isset($_GET['search']) ? $_GET['search'] : '';
$sql = "SELECT * FROM employee_info";

if (!empty($search)) {
	// Add the search condition to the SQL query
	$sql .= " WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%' OR middle_name LIKE '%$search%'";
  }

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Employee List</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/crudcss.css">
</head>
<body class="bgJPG">
	<button class="button" style="position: fixed; top: 35px; right: 30px;" href="home.php"><a href="adminPage.php">Home</a></button>
	<div class=" container">

		<h2 style="text-align: center; font-family: bebas neue; color: white; font-size: 5.2em;">Employee List</h2>


		<form method="GET" action="">
		<input class="searchDes" type="text" name="search" placeholder="Search Employee">
		<button class="btn btn-success noDes" type="submit">Search</button>
		</form>

		<form method="post" class="form-horizontal">
			<table class="table tabledank">

				<thead>
					<tr>
						<th>Name</th>
						<th>Email</th>
						<th>Contact Number</th>
					</tr>
				</thead>

				<tbody>
					<tr>
					<?php while ($row = mysqli_fetch_array($result)) { ?>
						<td class="col-md-3"><?php echo $row['salutation']. " " . $row['first_name']. " " . $row['middle_name']. " " . $row["last_name"]; ?></td>
						<td class="col-md-2"><?php echo $row['email']; ?></td>
						<td class="col-md-1"><?php echo $row['phone_num']; ?></td>
						<td class="col-md-1">
                            <a href='viewUserData.php?empID=<?php echo $row["empID"]; ?>' class="btn btn-success">View Detail</a>
                            <a href='empAttendancePage.php?empID=<?php echo $row["empID"]; ?>' class="btn btn-danger">View Attendance</a></td>
						
					</tr>
					<?php } ?>
				</tbody>

			</table>
		</form>
		
	</div>

    <script>
  const printBtn = document.getElementById('print');

  printBtn.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent form submission

    <?php while ($row = mysqli_fetch_array($result)) { ?>
      window.open('viewUserData.php?empID=<?php echo $row["empID"]; ?>', '_blank');
    <?php } ?>
  });
</script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>