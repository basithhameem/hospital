<?php
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "POST") {

$roomtype = mysqli_real_escape_string($con,$_POST['grw4g4']);
$building = mysqli_real_escape_string($con,$_POST['begfwhy4']);
$roomnumber = mysqli_real_escape_string($con,$_POST['roo234']);
$ac = mysqli_real_escape_string($con,$_POST['ejef42']);
$sea = mysqli_real_escape_string($con,$_POST['wgh424']);
$maid = mysqli_real_escape_string($con,$_POST['ye35h']);
$fridge = mysqli_real_escape_string($con,$_POST['fe3t5h3']);
$kitchen = mysqli_real_escape_string($con,$_POST['kig35n']);
$wifi = mysqli_real_escape_string($con,$_POST['w7453njvf']);
$phone = mysqli_real_escape_string($con,$_POST['pf83gf3dw']);


$sql = "INSERT INTO `hospital-room`.`rooms` (`id`, `userid`, `patientname`, `opnumber`, `number`, `building`, `type`, `ac`, `seaside`, `maid`, `fridge`, `kitchen`, `wifi`, `phone`, `date`) VALUES (NULL, NULL, NULL, NULL, '$roomnumber', '$building', '$roomtype', '$ac', '$sea', '$maid', '$fridge', '$kitchen', '$wifi', '$phone', CURRENT_TIMESTAMP);";


if (mysqli_query($con, $sql)) {
    header("location: staff-allocated-room.php?error=2");
} else {
    header("location: staff-allocated-room.php?error=1");
}

   }
mysqli_close($conn);
?>

