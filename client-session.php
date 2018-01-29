 <?php
   include("dbConnect.php");
   session_start();

   $user_check = $_SESSION['login-client'];

   $ses_sql = mysqli_query($con,"select username from patients where username = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['username'];

   if(!isset($_SESSION['login-client'])){
      header("location:client-login.php?error=2");
   }
?>
