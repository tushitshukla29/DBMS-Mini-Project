<?php
session_start();
$un=$_SESSION["username"];
include 'dbcon.php';
include 'error.php';
$pwd="";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if( $_POST["psw"]==$_POST["psw1"]){
  $pwd=$_POST["psw"];
}
  else{
  echo"<script type='text/javascript' > alert(' Password Missmatch'); </script>";
         header("refresh:0.5;url=down.php");}
   $sql=" update localuser set psw ='$pwd' where uname='$un'";
mysqli_query($conn,$sql);
header("refresh:0.5;url=userd.php");
die;
mysqli_close($conn);
      
}

