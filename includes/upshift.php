<?php
session_start();
include 'dbcon.php';
include 'error.php';
$eid="";
$did="";
$sh="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$eid =$_POST["eid"];
	$did =$_POST["did"];
	$sh =$_POST["shift"];
}


$sql="UPDATE employee SET shift='$sh' WHERE eid='$eid'";
mysqli_query($conn,$sql);

header("refresh:0.5;url=dash.php");
exit();
mysqli_close($conn);