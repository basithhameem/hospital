<?php $page="staff-add-room"; include('staff-session.php'); include('nav-staffs.php'); 
   $user_check = $_SESSION['login-staff']; 

?>

<form action = "staff-insert-room.php" method = "POST">

<div style="padding:0 16px;">
  <h2>Add Room in the Hospital</h2>
  <p>Fill the form below to add a hospital room  -</p>
  <fieldset>

	<legend>Room Preferences</legend>
	<p>
	Room Number: <input name="roo234" type="text">
	</p>
	<p>
	Building Name: <input name="begfwhy4" type="text">
	</p>
	<p>
	Room Type: <input name="grw4g4" type="radio" value="1"> Single Room <input name="roomtype"  type="radio" value="2"> Deluxe Room
	</p>


  </fieldset>
<br>
  <fieldset>

	<legend>Room Features:</legend>
Air Conditioned Room:  <select name="ejef42">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

Sea Side Facing Room:  <select name="wgh424">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

Maid Service:  <select name="ye35h">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

Refridgerator:  <select name="fe3t5h3">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

Kitchen:  <select name="kig35n">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

High Speed WiFi:  <select name="w7453njvf">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

Phone:  <select name="pf83gf3dw">
  
  <option value="1">Yes</option>
  <option value="0">No</option>
</select> <br>

	</p>


  </fieldset>
  	<p style="float:auto">
	<input type="submit" name="Submit" value="Give me the room!">
	</p>
</form>
</div>




</body></html>
