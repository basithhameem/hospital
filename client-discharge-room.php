<?php  $page = "client-dashboard"; include('client-session.php'); 
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "GET") {
$user_check = $_SESSION['login-client']; 
$roomid = base64_decode($_GET['aWQ']);
$useridSQL = mysqli_query($con,"select id from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
   $userid = $useridrow['id'];
$sql = "UPDATE rooms SET userid = NULL, patientname = NULL, opnumber = NULL WHERE id = '$roomid' AND userid = '$userid'";
if (mysqli_query($con, $sql)) {
    header("location: client-allocated-room.php?error=6");
} else {
    header("location: client-allocated-room.php?error=5");
}
   }
mysqli_close($conn);
?>

