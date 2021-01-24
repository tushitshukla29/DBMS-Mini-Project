<?php
if(session_status() == PHP_SESSION_NONE)
 {
session_start();
}
include 'dbcon.php';
include 'error.php';
   $eid="";
   $enm="";
   $add="";
   $gender="";
   $bday="";
   $email="";
   $did="";
   $sal="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eid =$_POST["eid"];
   $enm=$_POST["enm"];
   $add=$_POST["gd"];
   $gender=$_POST["gender"];
   $bday=$_POST["bday"];
   $email=$_POST["em"];
   $did=$_POST["did"];
   $sal=$_POST["sal"];

  
}


$sql="insert into employee (eid,ename,eaddr,gender,did,salary,dob,email) VALUES ('$eid', '$enm','$add','$gender','$did','$sal','$bday','$email')";
 $sql1="select eid from employee where eid='$eid'";
$r=mysqli_query($conn, $sql1);
$row1= mysqli_fetch_array($r);
if($row1[0]==$eid)
{
   $sql3="update employee set eid ='$eid',ename='$enm',eaddr='$add',gender='$gender',did='$did',salary='$sal',dob='$bday',email='$email' where eid='$eid'";
  if (mysqli_query($conn, $sql3)) {
    echo "New record created successfully1";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
}
else{

if(mysqli_query($conn,$sql)){
}
else{
 echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}}
//include 'dash.php';
header("refresh:0.5;url=dash.php");
exit();
mysqli_close($conn);
