<?php

include('client-session.php');
include("dbConnect.php");

$user_check = $_SESSION['login-client']; 
$useridSQL = mysqli_query($con,"select id from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
$userid = $useridrow['id'];


if($_SERVER["REQUEST_METHOD"] == "POST") {

$roomtype = "t1.type = " . mysqli_real_escape_string($con,$_POST['roomtype']);
$patient = mysqli_real_escape_string($con,$_POST['name']);
$opno = mysqli_real_escape_string($con,$_POST['op']);
$ac = " AND t1.ac = " . mysqli_real_escape_string($con,$_POST['ac']);
$sea = " AND t1.seaside = " . mysqli_real_escape_string($con,$_POST['sea']);
$maid = " AND t1.maid = " . mysqli_real_escape_string($con,$_POST['maid']);
$fridge = " AND t1.fridge = " . mysqli_real_escape_string($con,$_POST['fridge']);
$kitchen = " AND t1.kitchen = " . mysqli_real_escape_string($con,$_POST['kitchen']);
$wifi = " AND t1.wifi = " . mysqli_real_escape_string($con,$_POST['wifi']);
$phone = " AND t1.phone = " . mysqli_real_escape_string($con,$_POST['phone']);

$or = "active = 1";
if ($ac == " AND t1.ac = NA") { 
$or = $or . " OR ac = 0 OR ac = 1 ";
$ac = "";
} 

if ($sea == " AND t1.seaside = NA") { 
$or = $or . " OR seaside = 0 OR seaside = 1 ";
$sea = "";
} 

if ($maid == " AND t1.maid = NA") { 
$or = $or . " OR maid = 0 OR maid = 1 ";
$maid = "";
}

if ($fridge == " AND t1.fridge = NA") { 
$or = $or . " OR fridge = 0 OR fridge = 1 ";
$fridge = "";
} 

if ($kitchen == " AND t1.kitchen = NA") { 
$or = $or . " OR kitchen = 0 OR kitchen = 1 ";
$kitchen = "";
} 

if ($wifi == " AND t1.wifi = NA") { 
$or = $or . " OR wifi = 0 OR wifi = 1 ";
$wifi = "";
} 

if ($phone == " AND t1.phone = NA") { 
$or = $or . " OR phone = 0 OR phone = 1 ";
$phone = "";
}


$sql = "
SELECT id FROM
(SELECT * FROM rooms WHERE " . $or . " ) AS t1 WHERE t1.userid IS NULL AND t1.patientname IS NULL AND t1.opnumber IS NULL AND " . $roomtype . $ac . $sea . $maid . $fridge . $kitchen . $wifi . $phone . " ORDER BY RAND() LIMIT 1";


$sql = mysqli_query($con, $sql);
$sql = mysqli_fetch_array($sql,MYSQLI_ASSOC);
$roomid = $sql['id'];

if($roomid === NULL) {
header("location:client-add-room.php?error=10");
die();
}

$final = 'UPDATE rooms SET userid = ' . $userid . ', patientname = \'' . $patient . '\', opnumber = \'' . $opno . '\' WHERE id = ' . $roomid;


if (mysqli_query($con, $final)) {
    header("location:client-allocated-room.php?success=9");
} else {
    header("location:client-add-room.php?error=9");
}

}

mysqli_close($conn);
?>

