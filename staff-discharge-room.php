<?php
   include("dbConnect.php");

   if($_SERVER["REQUEST_METHOD"] == "GET") {
$roomid = base64_decode($_GET['aWQ']);
$sql = "UPDATE rooms SET userid = NULL, patientname = NULL, opnumber = NULL WHERE id = '$roomid'";
if (mysqli_query($con, $sql)) {
    header("location: staff-allocated-room.php?error=6");
} else {
    header("location: staff-allocated-room.php?error=5");
}
   }
mysqli_close($conn);
?>

