<?php
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "GET") {
$roomid = base64_decode($_GET['aWQ']);

$sql = "DELETE FROM `hospital-room`.`rooms` WHERE `rooms`.`id` =  '$roomid'";


if (mysqli_query($con, $sql)) {
    header("location: staff-allocated-room.php?error=3");
} else {
    header("location: staff-allocated-room.php?error=4");
}

   }
mysqli_close($conn);
?>

