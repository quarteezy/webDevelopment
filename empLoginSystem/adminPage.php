<?php 
session_start();
include "db_conn.php";

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

     $user_id = $_SESSION['id'];
     $query1 = "SELECT empID FROM user_data WHERE userID = $user_id";
     $result_empID1 = mysqli_query($conn, $query1);
     $row_empID = mysqli_fetch_assoc($result_empID1);
     $emp_id = $row_empID['empID'];

     $sql = "SELECT * FROM employee_info WHERE empID = '$emp_id'";
     $result = mysqli_query($conn, $sql);
     $row = mysqli_fetch_assoc($result);
     
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>HOME</title>
	<link rel="stylesheet" href="login.css">
     <link rel="stylesheet" href="css/stylekoto.css">
</head>
<body>
     <div class="bgJPG">
     <div class="center">
          
          <h1>Hello, Admin <?php echo $row['first_name']; ?></h1>
          <a href="logout.php" class="wah">Logout ||</a>
          <a href="emplistPage.php" class="">View Employee</a>
          <a href="userEdit.php" class="">|| View TI/TO</a>
     
     </div>
     </div>
</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>