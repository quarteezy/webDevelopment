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
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
</head>
<body>
     <div class="bgJPG">
     <div class="center3">
          
          <h1>Hello, <?php echo $row['first_name']; ?></h1>

          <form action="empAttendance.php" method="post">

          <?php
               if(isset($_GET['timeIn'])) {
               $message = $_GET['timeIn'];
               echo "<h2>Time in</h2>";
               echo "<input type='text' class='inputsize' style='text-align:center;font-size: 16px;' value='$message' disabled>";
               }
          ?>
          <?php
               if(isset($_GET['breakIn'])) {
               $message = $_GET['breakIn'];
               echo "<h2>Break In</h2>";
               echo "<input type='text' class='inputsize' style='text-align:center;font-size: 16px;' value='$message' disabled>";
               }
          ?>
          <?php
               if(isset($_GET['breakOut'])) {
               $message = $_GET['breakOut'];
               echo "<h2>Break Out</h2>";
               echo "<input type='text' class='inputsize' style='text-align:center;font-size: 16px;' value='$message' disabled>";
               }
          ?>
          <?php
               if(isset($_GET['timeOut'])) {
               $message = $_GET['timeOut'];
               echo "<h2>Time Out</h2>";
               echo "<input type='text' class='inputsize' style='text-align:center;font-size: 16px;' value='$message' disabled>";
               }
          ?>
          </br>
          </br>

          
          <input type="hidden" name="action" value="">
          <button type="submit" id="clock-btn" name="clockIn" class="btn btn-success btn-lg" >Clock In</button>
          <button type="submit" id="clock-btn" name="clockOut" class="btn btn-danger btn-lg" >Clock Out</button>
          <button type="submit" id="break-btn" name="breakIn" class="btn btn-success btn-lg" >Break In</button>
          <button type="submit" id="break-btn" name="breakOut" class="btn btn-danger btn-lg" >Break Out</button>
          </form>

          <div class="textcenterr">
          <a href="logout.php" class="">Logout ||</a>
          <a href="personalData.php" class="">Personal Data</a>
          <a href="userEdit.php" class="">|| Edit Data</a>
          </div>
     
     </div>
     </div>
     
     <script>
          function clockIn() {
               var clockBtn = document.getElementById("clock-btn");
                    if (clockBtn.innerHTML == "Clock In") {
                    clockBtn.innerHTML = "Clock Out";
                    clockBtn.classList.remove("btn-success");
                    clockBtn.classList.add("btn-danger");
                    } else {
                    clockBtn.innerHTML = "Clock In";
                    clockBtn.classList.remove("btn-danger");
                    clockBtn.classList.add("btn-success");
                    }
          }
     </script>

     <script>
          function breakIn() {
               var clockBtn = document.getElementById("break-btn");
                    if (clockBtn.innerHTML == "Break In") {
                    clockBtn.innerHTML = "Break Out";
                    clockBtn.classList.remove("btn-success");
                    clockBtn.classList.add("btn-danger");
                    } else {
                    clockBtn.innerHTML = "Break In";
                    clockBtn.classList.remove("btn-danger");
                    clockBtn.classList.add("btn-success");
                    }
          }
     </script>

</body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>