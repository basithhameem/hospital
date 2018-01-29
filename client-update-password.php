<?php  
include('client-session.php'); 
include("dbConnect.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {
$user_check = $_SESSION['login-client']; 
$pass = mysqli_real_escape_string($con,$_POST['newPass1']);
$currentPassword = mysqli_real_escape_string($con,$_POST['currentPassword']);
$useridSQL = mysqli_query($con,"select id, password from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
$userid = $useridrow['id'];
$currPassword = $useridrow['password'];

if($currentPassword !== $currPassword) {
	header("location: client-profile.php?error=11"); die();
}

$sql = "UPDATE patients SET password = '$pass' WHERE id = '$userid'";
if (mysqli_query($con, $sql)) {
    header("location: logout-clients.php");
} else {
    header("location: client-profile.php?error=12");
}
   }
mysqli_close($conn);
?>

