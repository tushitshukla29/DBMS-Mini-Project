<?php
session_start();
include 'dbcon.php';
$lo="";
$del="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (isset($_POST['lout']))
{
 
 session_destroy();    
}
}


header("refresh:0.5;url=../index.html");