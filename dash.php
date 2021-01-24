<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
     <title>24 HOURS NEWS</title>
    <link rel="icon" href="img\news1.jpg" type="img\jpg" sizes="36x36">
    <link rel="stylesheet" href="..\css\dp3.css">
    <link rel="stylesheet" href="..\css\dp2.css">
    
    
 
      
<?php
include 'dbcon.php';
include 'error.php';

if(session_status()==PHP_SESSION_NONE)
{
session_start();
}
$un="";
$pd="";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $un =$_POST["uname"];
  $pd=$_POST["psw"];
}
$sql="select pswd from admin where aname='$un'";
$sql1="select aname from admin where aname='$un'";
$r=mysqli_query($conn, $sql1) ;
//echo $r[0];
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
  </head>
  <body>

      <header>

          <p style="font-size:55px;font-weight:bold;width:80%;left:10%;text-align:center;color:beige;">
            Employee database management</p>



      </header>

      <section class="boxcontainer">
        <div class="side-nav">
          <nav >
            <ul>
              <li class="active">
                <div class="nav1" style="font-weight:bold;font-size:120%;">
<?php
if(session_status()==PHP_SESSION_NONE)
{
session_start();
}

    echo "welcome ";
if(isset( $_SESSION['username'])){
    echo $_SESSION['username'];}


?>
                 
                </div>
              </li>
            </ul>
           </nav>

        </div>  

<div class="main-content">
		
        <div class="dropdown-content">
            <div id="up" class="modal">
                     <form class="modal-content animate" action="changepro.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('up').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

          
                  <div class="container"><center>
        <p>Create Profile</p></center>
                  <label for="vcn"><b>Employee id</b></label>
                 <input type="text" placeholder=" Enter
                  id" name="eid" required>
                  <label for="vrn"><b> Name</b></label>
                  <input type="text" placeholder=" Enter name" name="enm" required>
                  <label for="vcn"><b>User Name</b></label>
                 <input type="text" placeholder=" Enter user name" name="un" required>
                 <label for="vcn"><b>Password</b></label>
                 <input type="text" placeholder=" Enter password" name="pd" required>

                  
                <label for="in"><b>Address</b></label>
                 <input type="text" placeholder="Enter address" name="gd" required>
                 <label for="in"><b>Gender</b></label>
                 <input type="radio" name="gender" value="male" checked> Male
                 <input type="radio" name="gender" value="female"> Female<br><br>
                  <label for="in"><b>Date of birth</b></label>
                 <input type="date" name="bday"><br><br>
                <label for="vcn"><b>Email</b></label>
                 <input type="email" name="em"><br><br>
                 <label for="in"><b>Department ID</b></label><br>
                 <input type="text" placeholder="Enter department id" name="did" required>
                 <label for="in"><b>Salary</b></label>
                 <input type="text" placeholder="Enter salary" name="sal" required>
                 <label for="sh"><b>Shift</b></label><br>
                 <input type="checkbox" name="shift" value="forenoon">Forenoon
<br><br>
<input type="checkbox" name="shift" value="afternoon">Afternoon 
<br><br>
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div>

 <div class="main-content">
    
        <div class="dropdown-content">
            <div id="us" class="modal">
                     <form class="modal-content animate" action="upshift.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('us').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container"><center><p>Update shift</p></center>
                  <label for="eid"><b> Employee id</b></label>
                 <input type="text" placeholder=" Enter Employee id" name="eid" required>
                  <label for="did"><b> Department id</b></label>
                  <input type="text" placeholder=" Enter Department id" name="did" required>
                 <label for="sh"><b>Shift</b></label><br>
                 <input type="checkbox" name="shift" value="forenoon">Forenoon
<br><br>
<input type="checkbox" name="shift" value="afternoon">Afternoon 
<br><br>
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div> 
<div class="main-content">
    
        <div class="dropdown-content">
            <div id="cp" class="modal">
                     <form class="modal-content animate" action="changepro.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('cp').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container">
                    <center>
         <label for="vcn"><b>Employee id</b></label>
                 <input type="text" placeholder=" Enter id" name="eid" required>
                   <p>Create profile</p></center>
                <label for="vrn"><b> Name</b></label>
                  <input type="text" placeholder=" Enter name" name="enm" required>
                   <label for="vcn"><b>User Name</b></label>
                 <input type="text" placeholder=" Enter user name" name="un" required>
                 <label for="vcn"><b>Password</b></label>
                 <input type="text" placeholder=" Enter password" name="pd" required>

                 <label for="in"><b>Address</b></label>
                 <input type="text" placeholder="Enter address" name="gd" required>
                 <label for="in"><b>Gender</b></label>
                 <input type="radio" name="gender" value="male" checked> Male
                 <input type="radio" name="gender" value="female"> Female<br><br>
                  <label for="in"><b>Date of birth</b></label>
                 <input type="date" name="bday"><br><br>
                <label for="vcn"><b>Email</b></label>
                 <input type="email" name="em"><br><br>
                 <label for="in"><b>Department ID</b></label><br>
                 <input type="text" placeholder="Enter department id" name="did" required>
                 <label for="in"><b>Salary</b></label>
                 <input type="text" placeholder="Enter salary" name="sal" required>
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div>
<div class="main-content">
    
        <div class="dropdown-content">
            <div id="dpp" class="modal">
                     <form class="modal-content animate" action="display.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('dpp').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container"><center>
        <p>Display Profile</p></center>
                  <label for="vcn"><b> Enter Employee id</b></label>
                 <input type="text" placeholder=" Enter Employee id" name="eid" required>
                 
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div>
<div class="main-content">
    
        <div class="dropdown-content">
            <div id="cb" class="modal">
                     <form class="modal-content animate" action="claim.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('cb').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container"><center>
        <p>Claim bonus</p></center>
                  <label for="vcn"><b> Enter Employee id</b></label>
                 <input type="text" placeholder=" Enter Employee id" name="eid" required>
                 
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div>

<div class="main-content">
    
        <div class="dropdown-content">
            <div id="dp" class="modal">
                     <form class="modal-content animate" action="del.php" method="post" autocomplete="off">
                   <div class="imgcontainer">
                  <span onclick="document.getElementById('dp').style.display='none'" class="close" title="Close ">&times;</span>
     
                   </div>

                  <div class="container"><center>
        <p>Delete Profile</p></center>
                  <label for="vcn"><b> Enter Employee id</b></label>
                 <input type="text" placeholder=" Enter Employee id" name="eid" required>
                 
                 <button type="submit">Submit</button>
      
    </div>

</form>
</div>
</div>
</div>
		  <div class="main">
                           
                  
               <div class="widget">
       <span><button  onclick="document.getElementById('cp').style.display='block'" style="width:auto;">Create Profile</button></span>
               </div>
            
               <div class="widget">

<span><button onclick="document.getElementById('up').style.display='block'" style="width:auto;">Create Profile</button></span></div>
  
 <div class="widget">
<span><button onclick="document.getElementById('us').style.display='block'" style="width:auto;">Update shift</button></span></div>  
<div class="widget">
   <span><button  onclick="document.getElementById('dpp').style.display='block'" style="width:auto;">Display Profile</button></span></div>  
<div class="widget">
    <span><button  onclick="document.getElementById('cb').style.display='block'" style="width:auto;">Claim bonus</button></span>
</div>  


<div class="widget">
<span><button onclick="document.getElementById('dp').style.display='block'" style="width:auto;">Delete profile</button></span></div>  
<div class="widget">
<span><form action="logout.php" method="post"><button type="submit" name="lout">logout</button></form> </span></div>

    </div>

    
  

 
                             </div>
      </section>

<script>

var modal = document.getElementById('up');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('dp');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('us');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('cp');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('cb');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
var modal = document.getElementById('dpp');

window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>
  </body>
<?php
mysqli_close($conn);
?>
</html>
