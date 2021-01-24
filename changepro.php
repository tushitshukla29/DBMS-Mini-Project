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
   $un="";
   $pd="";
   $sh="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eid =$_POST["eid"];
   $enm=$_POST["enm"];
   $add=$_POST["gd"];
   $gender=$_POST["gender"];
   $bday=$_POST["bday"];
   $email=$_POST["em"];
   $did=$_POST["did"];
   $sal=$_POST["sal"];
   $un=$_POST["un"];
   $pd=$_POST["pd"];
   $sh=$_POST["shift"];

  
}

 //$sql1="insert into localuser(eid,uname,psw) values('$eid','$un','$pd')";
$sql="insert into employee (eid,ename,eaddr,gender,did,salary,dob,email,shift) VALUES ('$eid', '$enm','$add','$gender','$did','$sal','$bday','$email','$sh')";
//$sql1="CREATE TRIGGER `app` AFTER INSERT ON `localuser` FOR EACH ROW BEGIN insert into localuser(eid,uname,psw) values('$eid','$un','$pd'); END"
 $sql1="insert into localuser (eid,uname,psw) VALUES ('$eid', '$enm','$email')";
mysqli_query($conn,$sql);
//header("refresh:0.5;url=dash.php");
//mysqli_query($conn,$sql1);
mysqli_query($conn, $sql1);
header("refresh:0.5;url=dash.php");

exit();
mysqli_close($conn);
