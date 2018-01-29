<?php $page = "staff-dashboard"; include('staff-session.php'); include('nav-staffs.php'); 
require_once("dbConnect.php");
   $user_check = $_SESSION['login-staff']; 

   $namesql = mysqli_query($con,"select * from staffs where username = '$user_check' ");
   $namerow = mysqli_fetch_array($namesql,MYSQLI_ASSOC);
   $name = $namerow['name'];
$useridSQL = mysqli_query($con,"select id from staffs where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
   $userid = $useridrow['id'];

   $roomsql = mysqli_query($con,"select number from rooms where userid IS NOT NULL");
   $roomrow = mysqli_fetch_array($roomsql,MYSQLI_ASSOC);
   $roomcount = mysqli_num_rows($roomsql);

?>

<div style="padding:0 16px;">
  <h2>Hospital Management System</h2>
  <p>Welcome to your dashboard <strong><?php echo $name; ?></strong>, Here you will find the total rooms allocated -</p>
  <p>Currently there are <strong><?php echo $roomcount; ?></strong> room(s) alloted to patients totally.</p>
  
</div>




</body></html>
