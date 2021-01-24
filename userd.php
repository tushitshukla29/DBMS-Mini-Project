<?php
if(session_status()==PHP_SESSION_NONE)
{
session_start();
}
include 'dbcon.php';

$un="";
$pd="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $un =$_POST["uname"];
  $pd=$_POST["psw"];
}

$sql="select psw from localuser where uname='$un'";
$sql1="select uname from localuser where psw='$pd'";
$r=mysqli_query($conn, $sql1) ;
$row= mysqli_fetch_array($r);

if($un!=$row[0]){
 echo"<script type='text/javascript' > alert(' invalid Username'); </script>";
         header("refresh:0.05;url=../index.html");
}
else{
$r1=mysqli_query($conn, $sql) ;
$row1= mysqli_fetch_array($r1);
if($pd!=$row1[0]){
 echo"<script type='text/javascript' > alert(' invalid Password '); </script>";
         header("refresh:0.5;url=../index.html");
  }}
error_reporting(0);
 if(empty( $_SESSION['username'])){
$_SESSION["username"] =$row[0];
$_SESSION["password"] =$row1[0];

}

?>       


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title> 24 news</title>
    <link rel="icon" href="img\logo.png" type="img\png" sizes="36x36">
    <link rel="stylesheet" href="..\css\dp3.css">
    <link rel="stylesheet" href="..\css\dp2.css">
    
<style>
table, td, th
{
border: 1px solid black;
width: 33%;
text-align: center;
border-collapse:collapse;
background-color:orange;
}
table { margin: auto; }
</style>
  </head>
  <body>
      <header>

         
          <p style="font-size:55px;font-weight:bold;width:80%;left:10%;text-align:center;color:beige;">
            Application of User Management Dashboard</p>



      </header>
 <section class="boxcontainer">
        <div class="side-nav">
          <nav >
            <ul>
              <li class="active">
                <div class="nav1" style="font-weight:bold;font-size:120%;">
<?php
if(session_status() == PHP_SESSION_NONE)
 {
session_start();
}


    echo "welcome ";
if(isset( $_SESSION['username'])){
    echo $_SESSION['username'];}


?>        
                </div>
              </li>
<li class="active">

<span><button onclick="document.getElementById('chp').style.display='block'" style="width:auto;">Change Profile</button></span>



<span><form action="logout.php" method="post"><button type="submit" name="lout">logout</button></form> </span>

               </li></ul>
           </nav>

        </div>

<div class="main-content">

           <div class="title">
              
</div>
<div class="options"> </div>

  <div class="dropdown-content">
            <div id="chp" class="modal">
                     <form class="modal-content animate" action="changepass.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('chp').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container">
<div id="chpcont">
                               
                   <label for="un"><b>Change Password</b></label><br>
     
      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
  <label for="psw1"><b>Re-Enter Password</b></label>
      <input type="password" placeholder="Re-Enter Password" name="psw1" required>
                 <button type="submit">Submit</button>
</div>

     
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('chp').style.display='none'" class="cancelbtn">Cancel</button>
     
    </div>
  </form>

   </div>
       

        </div></div>
 <div class="main">
                           <div class="widget">
<div id="images">
<?php

if(session_status()==PHP_SESSION_NONE)
{
session_start();
} 

$u1=$_SESSION["username"];
$sql2="select eid from localuser where uname='$u1'";
$eid=mysqli_query($conn, $sql2);
$rid= mysqli_fetch_array($eid);
$_SESSION["eid"] =$rid[0];
$ap=$_SESSION["eid"];
$sql3="select ename,eaddr,gender,did,salary,dob,email from employee where eid='$ap'";
$sql4="select sh from shift where eid='$ap'";

$r4=mysqli_query($conn, $sql3);
$s5=mysqli_query($conn, $sql4);

$a1= mysqli_fetch_array($s5);
echo "<table border='1'>";
echo "<tr><th>NAME</th><th>Address</th><th>Gender</th><th>Dept id</th><th>salary</th><th>dateofbirth</th><th>Email</th><th>shift</th></tr><tr>";
while($ta1 = mysqli_fetch_assoc($r4))
{
echo "<td>". $ta1['ename']."</td>";
echo "<td>". $ta1['eaddr']."</td>";
echo "<td>". $ta1['gender']."</td>";
echo "<td>". $ta1['did']."</td>";
echo "<td>". $ta1['salary']."</td>";
echo "<td>". $ta1['dob']."</td>";
echo "<td>". $ta1['email']."</td>";
echo "<td>". $a1[0]."</td>";
}

echo "</tr>";
echo "</table><br><br>"; 
?>
                       </div>
                        </div>
        </div>
 </section>
<script>

var modal1 = document.getElementById('upr');

window.onclick = function(event) {
    if (event.target == modal1) {
        modal.style.display = "none";
    }
}
var modal2 = document.getElementById('chp');

window.onclick = function(event) {
    if (event.target == modal2) {
        modal.style.display = "none";
    }
}
var modal3 = document.getElementById('am');

window.onclick = function(event) {
    if (event.target == modal3) {
        modal.style.display = "none";
    }
}
</script>
  </body>
<?php
mysqli_close($conn);
?>
</html>
