<?php  $page = "client-add-room"; include('client-session.php'); include('nav-clients.php'); 
include("dbConnect.php");
   $user_check = $_SESSION['login-client']; 

   $namesql = mysqli_query($con,"select * from patients where username = '$user_check' ");
   $namerow = mysqli_fetch_array($namesql,MYSQLI_ASSOC);
   $name = $namerow['name'];
$useridSQL = mysqli_query($con,"select id from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
   $userid = $useridrow['id'];

   $roomsql = mysqli_query($con,"select number from rooms where userid = '$userid' ");
   $roomrow = mysqli_fetch_array($roomsql,MYSQLI_ASSOC);
   $roomcount = mysqli_num_rows($roomsql);

?>



<div style="padding:0 16px;">
  <h2>Get Room in the Hospital</h2>
  <p>Fill the form below to get your desired room  -</p>
<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 9) 
{ echo "<h2>Error assigning your room! Contact hospital developer.</h2>"; 
} ?>

<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 10) 
{ echo "<h2>Sorry, No rooms available based on your preferences! Please check again!</h2>"; 
} ?>

<form action="client-insert-room.php" onsubmit="return validateForm()" method="POST" name="addroom">
  <fieldset>

	<legend>Room Preferences</legend>
	<p>
	Room Type: <input name="roomtype" type="radio" value="1" checked="1" checked="checked"> Single Room <input name="roomtype"  type="radio" value="2"> Deluxe Room
	</p>
	<p>
	Patient Name: <input type="text" name="name" required>
	</p>
	<p>
	O.P Number: <input type="text" name="op" required>
	</p>


  </fieldset>
<br>
  <fieldset>

	<legend>Room Features:</legend>
Air Conditioned Room:  <select name="ac">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

Sea Side Facing Room:  <select name="sea">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

Maid Service:  <select name="maid">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

Refridgerator:  <select name="fridge">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

Kitchen:  <select name="kitchen">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

High Speed WiFi:  <select name="wifi">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

Phone:  <select name="phone">
  <option value="NA">Whichever Available</option>
  <option value="1">Required</option>
  <option value="0">Not Required</option>
</select> <br>

	</p>


  </fieldset>
  	<p style="float:auto">
	<input type="submit" name="Submit" value="Give me the room!">
	</p>
</form>
</div>




</body></html>
