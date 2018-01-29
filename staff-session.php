 <?php
   include("dbConnect.php");
   session_start();

   $user_check = $_SESSION['login-staff'];

   $ses_sql = mysqli_query($con,"select username from staffs where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login-staff'])){
      header("location:staff-login.php?error=2");
   }
?>
