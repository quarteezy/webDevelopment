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

	$id = $_POST['eci_id'];

	$sql = "DELETE FROM employee_ice WHERE eci_id=$id";
	mysqli_query($conn, $sql);
	header('location: eciCrud.php');

?>