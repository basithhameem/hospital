<?php

include("dbConnect.php");

if($_SERVER["REQUEST_METHOD"] == "POST") {

$name = mysqli_real_escape_string($con,$_POST['name']);
$email = mysqli_real_escape_string($con,$_POST['email']);
$password = mysqli_real_escape_string($con,$_POST['password']);
$dateofbirth = mysqli_real_escape_string($con,$_POST['dateofbirth']);
$gender = mysqli_real_escape_string($con,$_POST['gender']);
$blood = mysqli_real_escape_string($con,$_POST['bloodgroup']);
$address1 = mysqli_real_escape_string($con,$_POST['address1']);
$address2 = mysqli_real_escape_string($con,$_POST['address2']);
$city = mysqli_real_escape_string($con,$_POST['city']);
$district = mysqli_real_escape_string($con,$_POST['district']);
$state = mysqli_real_escape_string($con,$_POST['state']);
$country = mysqli_real_escape_string($con,$_POST['country']);
$phone = mysqli_real_escape_string($con,$_POST['phone']);

$sql = "INSERT INTO `patients` (`id`, `name`, `username`, `password`, `dateofbirth`, `bloodgroup`, `gender`, `address1`, `address2`, `city`, `district`, `state`, `country`, `phone`, `timestamp`) VALUES (NULL, '$name', '$email', '$password', '$dateofbirth', '$blood', '$gender', '$address1', '$address2', '$city', '$district', '$state', '$country', '$phone', CURRENT_TIMESTAMP);";

if (mysqli_query($con, $sql)) {
    header("location: client-login.php");
} else {
    header("location: client-register.html");
}
}
mysqli_close($conn);
?>