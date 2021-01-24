
<!DOCTYPE html>
	<head>
    <meta charset="utf-8">
     <title>24 HOURS NEWS</title>
    <link rel="icon" href="img\news4.png" type="img\png" sizes="36x36">
    <link rel="stylesheet" href="..\css\dp3.css">
    <link rel="stylesheet" href="..\css\dp2.css">
    </head>
    <body>

      <header>

          <p style="font-size:55px;font-weight:bold;width:80%;left:10%;text-align:center;color:beige;">
            Employee database management</p></header>
            <?php
include 'dbcon.php';
include 'error.php';
if(session_status()==PHP_SESSION_NONE)
{
session_start();
} 
$eid="";
$u1=$_SESSION["username"];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $eid =$_POST["eid"];
  
}/*
$sql2="select eid from employee where eid='$eid'";
$eid=mysqli_query($conn, $sql2);
$rid= mysqli_fetch_array($eid);
$_SESSION["eid"] =$rid[0];
$eid=$_SESSION["eid"];*/
$sql3="select ename,eaddr,gender,did,salary,dob,email,shift from employee where eid='$eid'";

// $sql3="CALL display('$eid')";

//$sql4="select sh from shift where eid='$eid'";

$r4=mysqli_query($conn, $sql3);
echo "<table border='1'>";
echo "<tr><th>NAME</th><th>Address</th><th>Gender</th><th>Dept id</th><th>salary</th><th>dateofbirth</th><th>Email</th><th>Shift</th></tr><tr>";
while($ta1 = mysqli_fetch_assoc($r4))
{
echo "<td>". $ta1['ename']."</td>";
echo "<td>". $ta1['eaddr']."</td>";
echo "<td>". $ta1['gender']."</td>";
echo "<td>". $ta1['did']."</td>";
echo "<td>". $ta1['salary']."</td>";
echo "<td>". $ta1['dob']."</td>";
echo "<td>". $ta1['email']."</td>";
echo "<td>". $ta1['shift']."</td>";
}

echo "</tr>";
echo "</table><br><br>"; 
?>
            <div class="widget">
<span><form action="d1.php" method="post"><button type="submit" name="lout">back</button></form> </span></div>
  </body></html>
