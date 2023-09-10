<?php
session_start();
include "db_conn.php";
	$user_id = $_SESSION['id'];
    $emp_id = $_GET["empID"];

// Modal Retrieve
if (isset($_POST['editModal'])) {
	$id = $_POST['eci_id'];

	$sql = "SELECT * FROM employee_ice WHERE eci_id=$id";
	$retrieve = mysqli_query($conn, $sql);
	$data = mysqli_fetch_array($retrieve);

	header('location: eciCrud.php');
}

// Retrieve records
$query = "SELECT DISTINCT week, SEC_TO_TIME(SUM(TIME_TO_SEC(totalHours))) AS totalHours FROM employee_attendance WHERE empID = '$emp_id' GROUP BY week";
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
    <button class="button" style="position: fixed; top: 35px; right: 30px;" href="emplistPage.php"><a href="emplistPage.php">Back</a></button>
    <button class="button" style="position: fixed; top: 90px; right: 30px;"><a href="adminPage.php">Home</a></button>
	<div class=" container">

		<h2 style="text-align: center; font-family: bebas neue; color: white; font-size: 5.2em;">Employee Attendance</h2>

		<form method="post" class="form-horizontal">
			<table class="table tabledank2">

            <thead>
                <tr>
                    <th>Week</th>
                    <th>Total Hours</th>
                </tr>
            </thead>
            <tbody>
            <?php
            if ($result && mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $week = $row['week'];
                    $totalHours = $row['totalHours'];

                    $timeComponents = explode(':', $totalHours);
                    $hours = (int)$timeComponents[0];
                    $minutes = (int)$timeComponents[1];
                    $seconds = (int)$timeComponents[2];
                    ?>
                    <tr>
                        <td class="col-md-1"><?php echo $week; ?></td>
                        <td class="col-md-1">
                            <?php
                            echo $hours . " hr " . $minutes . " min " . $seconds . " sec";
                            ?>
                        </td>
                        <td class="col-md-2">
                            <a href='empAttendanceRecord.php?empID=<?php echo $emp_id; ?>&week=<?php echo $week; ?>' class="btn btn-primary">View</a>
                        </td>
                    </tr>
                    <?php
                }
            } else {
                ?>
                <tr>
                    <td colspan="3">No attendance records found.</td>
                </tr>
                <?php
            }
            ?>
        </tbody>

			</table>
		</form>
		
	</div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>
</html>