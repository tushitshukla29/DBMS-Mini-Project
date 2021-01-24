<?php
session_start();
include 'dbcon.php';
include 'error.php';
$eid="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$eid =$_POST["eid"];}
	session_destroy();
  
 $sql=" DELETE FROM `employee` where eid='$eid'";
if(mysqli_query($conn,$sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($conn);
}
header("refresh:0.5;url=dash.php");
exit();
mysqli_close($conn);