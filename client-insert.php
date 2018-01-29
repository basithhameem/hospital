<?php
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

$name = mysqli_real_escape_string($con,$_POST['name']);
$username = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$dateofbirth = mysqli_real_escape_string($con,$_POST['dob']);
$bloodgroup = mysqli_real_escape_string($con,$_POST['bgroup']);
$address1 = mysqli_real_escape_string($con,$_POST['address1']);
$address2 = mysqli_real_escape_string($con,$_POST['address2']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$district = mysqli_real_escape_string($con,$_POST['district']);
$state = mysqli_real_escape_string($con,$_POST['state']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);

$sql = "INSERT INTO `hospital-room`.`patients` (`name`, `username`, `password`, `dateofbirth`, `bloodgroup`, `address1`, `address2`, `city`, `district`, `state`, `country`, `phone`, `gender`, `timestamp`) VALUES ('$name', '$username', '$password', '$dateofbirth', '$bloodgroup', '$address1', '$address2', '$city', '$district', '$state', '$country', '$phone', '$gender', CURRENT_TIMESTAMP);";


if (mysqli_query($con, $sql)) {
    header("location: client-login.php?success=10");
} else {
header("location: client-register.php?error=1");
}

   }
mysqli_close($conn);
?>

