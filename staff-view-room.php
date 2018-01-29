<?php $page="staff-allocated-room"; include('staff-session.php'); include('nav-staffs.php'); 
   $user_check = $_SESSION['login-staff']; 
$roomid = base64_decode($_GET['aWQ']);


?>



<div style="padding:0 16px;">
  <h2>View Room Details</h2>
  <p>View the room details - <?php 
$query = "select * from rooms where id = '$roomid' "; 
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){
$roomno = $row['number'];
$patientname = $row['patientname'];
$op = $row['opnumber'];
$roomtype = $row['type'];
$ac = $row['ac'];
$sea = $row['seaside'];
$fridge = $row['fridge'];
$kitchen = $row['kitchen'];
$wifi = $row['wifi'];
$phone = $row['phone'];
$date = $row['date'];
} ?></p>
  <fieldset>

	<legend>Room Details</legend>
	<p>
	Patient Name: <strong><?php echo $roomno; ?></strong>
	</p>
	<p>
	Patient Name: <strong><?php echo $patientname; ?></strong>
	</p>
	<p>
	O.P Number: <strong><?php echo $op; ?></strong>
	</p>
	<p>
	Room Type: <strong><?php if($roomtype == '1') {echo 'Single Room';} else {echo 'Deluxe Room';}?></strong
	</p>
	<p>
	Allocated Date/Time: <strong><?php echo $date; ?></strong
	</p>
  </fieldset>
<br>
 <fieldset>

	<legend>Additional Room Features</legend>
<p>


<?php 
if (!empty($ac)) {echo "<strong>Air Conditioner</strong><br>";}
if (!empty($sea)) {echo "<strong>Sea Side Facing Room</strong><br>";}
if (!empty($fridge)) {echo "<strong>Fridge</strong><br>";}
if (!empty($kitchen)) {echo "<strong>Kitchen</strong><br>";}  
if (!empty($wifi)) {echo "<strong>High Speed WiFi</strong><br>";} 
if (!empty($phone)) {echo "<strong>Phone</strong><br>";} 
?>

	</p>


  </fieldset>
  
</div>




</body></html>
