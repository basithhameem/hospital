<?php $page="staff-allocated-room"; include('staff-session.php'); include('nav-staffs.php'); 
   $user_check = $_SESSION['login-staff']; 

   $roomsql = mysqli_query($con,"select * from rooms");
   $patientcount = mysqli_query($con,"select * from rooms WHERE userid IS NOT NULL");
   $roomrow = mysqli_fetch_array($roomsql,MYSQLI_ASSOC);
   $roomcount = mysqli_num_rows($roomsql);
   $patientrow = mysqli_fetch_array($patientcount,MYSQLI_ASSOC);
   $patientcount = mysqli_num_rows($patientcount);

?>

<div style="padding:0 16px;">
  <h2>Current Room Allocated</h2>
<?php if($roomcount == 0) { echo '<p>Currently there are <strong>0</strong> rooms. Please add rooms.</div></body></html>'; die();} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 1) 
{ echo "<h3>Room not added. It can be because of duplicate or missing value!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 2) 
{ echo "<h3>Room added Successfully!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 3) 
{ echo "<h3>Room deleted Successfully!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 4) 
{ echo "<h3>Room not deleted. Maybe the room doesn't exist!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 6) 
{ echo "<h3>Patient Discharged Successfully!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 5) 
{ echo "<h3>Patient not discharged! Maybe the patient has already been discharged.</h3>"; 
} ?>

  <p>Currently there are <strong><?php echo $roomcount; ?></strong> room(s) in which <strong><?php echo $patientcount; ?></strong> room(s) are alloted to customers.</p>
  <table id="rooms">
  <tr>
    <th>Room Number</th>
    <th>Building</th>
    <th>User Booked</th>
    <th>View Details</th>
    <th>Discharge</th>
    <th>Delete</th>
  </tr>
<?php  // Attempt select query execution
$sql = "select * from rooms";
if($result = mysqli_query($con, $sql)){
        while($row = mysqli_fetch_array($result)){
          if (!empty($row['userid'])) {
                  $clientusername = mysqli_query($con, "SELECT name FROM patients WHERE id = " . $row['userid']);
                  $clientidrow = mysqli_fetch_array($clientusername,MYSQLI_ASSOC);
                  $clientuserid = $clientidrow['name'];
                } else {
                  $clientuserid = "No Patient Booked";
                }

	if($clientuserid == "No Patient Booked") {
		$dischargebutton = "<button class='button discharge' disabled>Discharge</button>";
		} else {
		$dischargebutton = "<a href='staff-discharge-room.php?aWQ=" . base64_encode($row['id']) . "'><button class='button dischargeenable'>Discharge</button></a>";
		}
		
            echo "<tr>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $row['building'] . "</td>";
                echo "<td>" . $clientuserid . "</td><td><a target='_blank' href='staff-view-room.php?aWQ=" . base64_encode($row['id']) . "'><button class='button viewroom'>View Room</button></a></td><td>". $dischargebutton ."</td><td><a href='staff-delete-room.php?aWQ=" . base64_encode($row['id']) . "'><button class='button deleteroom'>Delete Room</button></a></td></tr>";

            echo "</tr>";
        }}
        ?>
</table>
  
</div>




</body></html>
