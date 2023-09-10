<?php
session_start();
include "db_conn.php";
	$user_id = $_SESSION['id'];
    $emp_id = $_GET["empID"];
    $week = $_GET["week"];

// Modal Retrieve
if (isset($_POST['editModal'])) {
	$id = $_POST['eci_id'];

	$sql = "SELECT * FROM employee_ice WHERE eci_id=$id";
	$retrieve = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($retrieve);

	header('location: eciCrud.php');
}

// Retrieve records
$query = "SELECT * FROM employee_attendance WHERE empID = '$emp_id' AND week = '$week'";
$result = mysqli_query($conn, $query);
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
    <button class="button" style="position: fixed; top: 35px; right: 30px;"><a href="empAttendancePage.php?empID=<?php echo $emp_id; ?>">Back</a></button>
    <button class="button" style="position: fixed; top: 90px; right: 30px;"><a href="adminPage.php">Home</a></button>
	<div class=" container">

		<h2 style="text-align: center; font-family: bebas neue; color: white; font-size: 5.2em;">Employee Attendance Record</h2>

		<form method="post" class="form-horizontal">
			<table class="table tabledank3">

				<thead>
					<tr>
						<th>Date</th>
						<th>Time-In</th>
						<th>Break-In</th>
						<th>Break-Out</th>
						<th>Time-Out</th>
						<th>Total Hours</th>
					</tr>
				</thead>

				<tbody>
                    <?php while ($row = mysqli_fetch_array($result)) { ?>
                        <tr>
                        <td class="col-md-1">
                            <?php
                                $date = $row['date'];
                                $formattedDate = date('F j, Y', strtotime($date));
                                echo $formattedDate;
                            ?>
                        </td>
                        <td class="borderz col-md-2"><?php echo $row['timeIn']; ?></td>
                        <td class="borderz col-md-2"><?php echo $row['breakIn']; ?></td>
                        <td class="borderz col-md-2"><?php echo $row['breakOut']; ?></td>
                        <td class="borderz col-md-2"><?php echo $row['timeOut']; ?></td>
                        <td class="col-md-1">
                            <?php
                                $time = $row['totalHours'];
                                $timeComponents = explode(':', $time);
                                $hours = (int)$timeComponents[0];
                                $minutes = (int)$timeComponents[1];
                                $seconds = (int)$timeComponents[2];
                                echo $hours . " hr " . $minutes . " min " . $seconds . " sec";
                            ?>
                        </td>
                        </tr>
                    <?php } ?>
                </tbody>

			</table>
		</form>
		
	</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>