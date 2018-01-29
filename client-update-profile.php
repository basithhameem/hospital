<?php
include('client-session.php'); 
include("dbConnect.php");
if($_SERVER["REQUEST_METHOD"] == "POST") {
$dob = mysqli_real_escape_string($con,$_POST['dateofbirth']);
$blood = mysqli_real_escape_string($con,$_POST['bloodgroup']);
$address1 = mysqli_real_escape_string($con,$_POST['address1']);
$address2 = mysqli_real_escape_string($con,$_POST['address2']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$district = mysqli_real_escape_string($con,$_POST['district']);
$state = mysqli_real_escape_string($con,$_POST['state']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$user_check = $_SESSION['login-client']; 
$useridSQL = mysqli_query($con,"select id, password from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
$userid = $useridrow['id'];
$sql = "UPDATE patients SET dateofbirth = '$dob', bloodgroup = '$blood', address1 = '$address1', address2 = '$address2', city = '$city', district = '$district', state = '$state', country = '$country', phone = '$phone' WHERE id = '$userid'";
if (mysqli_query($con, $sql)) {
    header("location: client-dashboard.php");
} else {
    header("location: client-profile.php?error=13");
}
}
mysqli_close($conn);
?>