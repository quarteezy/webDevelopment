<?php
session_start();
include "db_conn.php";
	$user_id = $_SESSION['id'];

    $query1 = "SELECT empID FROM user_data WHERE userID = $user_id";
    $result_empID1 = mysqli_query($conn, $query1);
    $row_empID = mysqli_fetch_assoc($result_empID1);
    $emp_id = $row_empID['empID'];

    /*
    $query2 = "SELECT attID FROM emp_attendance WHERE empID = '$emp_id' AND date = CURDATE()";
    $result_attID = mysqli_query($conn, $query2);
    $row_attID = mysqli_fetch_assoc($result_attID);
    $att_id = $row_attID['attID'];
    */
    
    //$current_date = date('Y-m-d');
    //$current_time = date('H:i:s');
    date_default_timezone_set('Asia/Manila');
    $date = date("Y-m-d");
    $current_time = date('H:i:s');

    
    if (isset($_POST['clockIn'])) {

        // Retrieve the latest week and date from the table
        $query = "SELECT week, date FROM employee_attendance WHERE empID = '$emp_id' ORDER BY date DESC LIMIT 1";
        $result = mysqli_query($conn, $query);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $previousWeek = [
                'week' => $row['week'],
                'date' => $row['date']
            ];
        } else {
            // If no previous data exists, initialize with default values
            $previousWeek = null;
        }

        // Calculate the week for the new data
        $week = calculateWeek($date, $previousWeek);

        // Insert data 
        $clock_In = "INSERT INTO employee_attendance(empID, date, timeIn, week) VALUES ('$emp_id', '$date', NOW(), $week)";
        mysqli_query($conn, $clock_In);

        // Get attID for newly inserted record
        $query_att_id = "SELECT attID FROM employee_attendance WHERE empID='$emp_id' AND date='$date' AND timeIn = '$current_time'";

        // Execute the SQL query
        $result_att_id = mysqli_query($conn, $query_att_id);

        // Get the attID from the query result
        $att_id = mysqli_fetch_assoc($result_att_id)['attID'];

        // Set attID as session variable
        $_SESSION['att_id'] = $att_id;

        header("Location: home.php?timeIn=$current_time");
	    exit();
    }

    if (isset($_POST['breakIn'])) {
        $att_id = $_SESSION['att_id'];
    
        // Update breakIn for the matching attID, empID, and date
        $query_update = "UPDATE employee_attendance SET breakIn = NOW() WHERE attID = '$att_id' AND empID = '$emp_id'";
        mysqli_query($conn, $query_update);
        
        header("Location: home.php?breakIn=$current_time");
        exit();
    }
    
    if (isset($_POST['breakOut'])) {
        $att_id = $_SESSION['att_id'];
    
        // Update breakOut for the matching attID, empID, and date
        $query_update = "UPDATE employee_attendance SET breakOut = NOW() WHERE attID = '$att_id' AND empID = '$emp_id' AND date = '$date'";
        mysqli_query($conn, $query_update);
        
        header("Location: home.php?breakOut=$current_time");
        exit();
    }

    if (isset($_POST['clockOut'])) {

        // Get the current attID from the session variable
        $att_id = $_SESSION['att_id'];
        
         // Get the current time
         date_default_timezone_set('Asia/Manila');

         // Get the current time
         $timeOut = date('Y-m-d H:i:s');
         
         // Update the timeOut and total hours worked
         $query_update = "UPDATE employee_attendance SET timeOut = '$timeOut', totalHours = TIMEDIFF('$timeOut', CONCAT(date, ' ', timeIn)) - TIMEDIFF(breakOut, breakIn) WHERE attID = '$att_id' AND empID = '$emp_id'";
         mysqli_query($conn, $query_update);
         
        
        // Unset the session variable
        unset($_SESSION['att_id']);
        
        header("Location: home.php?timeOut=$current_time");
		exit();
    }

    function calculateWeek($date, $previousWeek) {
        $previousDate = $previousWeek ? $previousWeek['date'] : null;
      
        if ($previousDate && date('W', strtotime($date)) === date('W', strtotime($previousDate))) {
          // If the current date is in the same week as the previous date, use the same week value
          $week = $previousWeek['week'];
        } else {
          // If it's a new week, increment the week value
          $week = $previousWeek ? $previousWeek['week'] + 1 : 1;
        }
      
        return $week;
      }

?>