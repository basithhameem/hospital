<?php  $page = "client-profile"; include('client-session.php'); include('nav-clients.php'); 
include("dbConnect.php");
   $user_check = $_SESSION['login-client']; 

   $namesql = mysqli_query($con,"select * from patients where username = '$user_check' ");
   $namerow = mysqli_fetch_array($namesql,MYSQLI_ASSOC);
	$name = $namerow['name'];
	$username = $namerow['username'];
	$dob = $namerow['dateofbirth'];
	$blood = $namerow['bloodgroup'];
	$address1 = $namerow['address1'];
	$address2 = $namerow['address2'];
	$city = $namerow['city'];
	$district = $namerow['district'];
	$state = $namerow['state'];
	$country = $namerow['country'];
	$phone = $namerow['phone'];
	$gender = $namerow['gender'];
	if($gender == 1) { $gender = "Male"; } elseif($gender == 2) { $gender = "Female"; } else { $gender = "Others"; }
$useridSQL = mysqli_query($con,"select id from patients where username = '$user_check' ");
$useridrow = mysqli_fetch_array($useridSQL,MYSQLI_ASSOC);
$userid = $useridrow['id'];


?>

<div style="padding:0 16px;">
  <h2>My Profile</h2>
  <p>Hi <?php echo $name; ?>, Here is your current details, you can edit your profile here -</p><br>

<fieldset style="width: 500px">

<legend>Personal Details</legend>
<form action= "client-update-profile.php" method="POST">
<p>Name: <input type="text" value="<?php echo $name; ?>" disabled>
<p>Gender: <input type="text" value="<?php echo $gender; ?>" disabled>
<p>Email: <input type="text" value="<?php echo $username; ?>" name="email" disabled>
<p>Date of Birth: <input type="text" value="<?php echo $dob; ?>" name="dateofbirth">
<p>Blood Group: <input type="text" value="<?php echo $blood; ?>" name="bloodgroup">
<p>Address 1: <input type="text" value="<?php echo $address1; ?>" name="address1">
<p>Address 2: <input type="text" value="<?php echo $address2; ?>" name="address2">
<p>City: <input type="text" value="<?php echo $city; ?>" name="city">
<p>District: <input type="text" value="<?php echo $district; ?>" name="district">
<p>State: <input type="text" value="<?php echo $state; ?>" name="state">
<p>Country: <input type="text" value="<?php echo $country; ?>" name="country">
<p>Phone: <input type="text" value="<?php echo $phone; ?>" name="phone">
<p><input type="submit" name="submitProfile" id="submitProfile" value="Edit Profile"></p>
</form>

</fieldset>
<br>

<fieldset style="width: 500px">

<legend>Password Management</legend>
<form action= "client-update-password.php" method="POST" onSubmit="return checkPass();">
	<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 13) { echo "<h2>Profile not updated!</h2>"; } ?>
	<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 11) { echo "<h2>Current Password is wrong!</h2>"; } ?>
	<?php if($_SERVER["REQUEST_METHOD"] == "GET" && $_GET['error'] == 12) { echo "<h2>Password cannot be updated. Please contact Hospital"; } ?>
<p>Current Password: <input type="password" name="currentPassword"></p>
<p>New Password: <input type="password" name="newPass1" id="newPass1"></p>
<p>Retype New Password: <input type="password" name="newPass2" id="newPass2"></p>
<p><input type="submit" name="submitPassword" id="submitPassword" value="Change Password"></p>
</form>
</fieldset>

</div>

</body>

<script type="text/javascript">



function checkPass() {

	var newPass1 = document.getElementById("newPass1").value;
	var newPass2 = document.getElementById("newPass2").value;

	if (newPass1 == '' | newPass2 == '') {
		alert('How can the password be empty?');
		return false;
	}

    if (newPass1 !== newPass2)
	{
		alert('New Passwords dont match!');
		return false;
	}


	return true;

}

</script>

</html>
