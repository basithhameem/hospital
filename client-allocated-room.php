<?php  $page = "client-allocated-room"; include('client-session.php'); include('nav-clients.php'); 
include("dbConnect.php");
   $user_check = $_SESSION['login-client']; 

   $namesql = mysqli_query($con,"select * from patients where username = '$user_check' ");
   $namerow = mysqli_fetch_array($namesql,MYSQLI_ASSOC);
   $name = $namerow['name'];
$useridSQL = mysqli_query($con,"select id from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
   $userid = $useridrow['id'];

   $roomsql = mysqli_query($con,"select * from rooms where userid = '$userid' ");
   $roomrow = mysqli_fetch_array($roomsql,MYSQLI_ASSOC);
   $roomcount = mysqli_num_rows($roomsql);


?>

<div style="padding:0 16px;">
  <h2>Current Room Allocated</h2>
  <p>The rooms allocated to you <strong><?php echo $name; ?></strong> are shown below -</p>
<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 6) 
{ echo "<h3>Patient Discharged Successfully!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['success'] == 9) 
{ echo "<h3>Room allocated Successfully!</h3>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 5) 
{ echo "<h3>Patient not discharged! Maybe the patient has already been discharged.</h3>"; 
} ?>
<?php if($roomcount == 0) { echo '<p>Currently there are <strong>0</strong> room alloted to you. </div></body></html>'; die();} ?>
  <p>Currently there are <strong><?php echo $roomcount; ?></strong> room(s) alloted to you.</p>

<table id="rooms">
  <tr>
    <th>Room No</th>
    <th>Building Name</th>
    <th>Room Details</th>
    <th>Checkout</th>
  </tr>
<?php 
$query = "select * from rooms where userid = '$userid' "; 
$result = mysqli_query($con,$query);
while($row = mysqli_fetch_array($result)){   //Creates a loop to loop through results
echo "<tr><td>" . $row['number'] . "</td><td>" . $row['building'] . "</td><td><a target='_blank' href='client-view-room.php?aWQ=" . base64_encode($row['id']) . "'><button class='button viewroom'>View Room</button></a></td><td><a href='client-discharge-room.php?aWQ=" . base64_encode($row['id']) . "'><button class='button discharge'>Discharge</button></td></tr>";  //$row['index'] the index here is a field name
}

?>

</table>

  
</div>




</body>

</html>
