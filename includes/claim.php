
    
<?php
if(session_status() == PHP_SESSION_NONE)
 {
session_start();
}
include 'dbcon.php';
include 'error.php';
$mon="";
$cid="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eid=$_POST["eid"];
}/*
$sqp="select eid from localuser where ='$eid'";
$d1=mysqli_query($conn, $sqp);
$w= mysqli_fetch_array($d1);*/

 $sql4="select salary from employee where eid='$eid'";
$d=mysqli_query($conn, $sql4);
$w1= mysqli_fetch_array($d);


if($w1[0]==null)
{
echo"<script type='text/javascript' > alert('zero balance'); </script>";
       //  header("refresh:0.5;url=dash.php");
}
$mon=rand(10,50);
$num=$w1[0]+$mon;
echo $num;
$sql3="update employee set salary ='$num' where eid='$eid'";
//mysqli_query($conn, $sql3);
if (mysqli_query($conn, $sql3)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($conn);
}
// header("refresh:0.5;url=dash.php");
 
exit();
mysqli_close($conn);
?>

