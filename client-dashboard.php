<?php  $page = "client-dashboard"; include('client-session.php'); include('nav-clients.php'); 
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

   $roomsql = mysqli_query($con,"select number from rooms where userid = '$userid' ");
   $roomrow = mysqli_fetch_array($roomsql,MYSQLI_ASSOC);
   $roomcount = mysqli_num_rows($roomsql);

?>

<div style="padding:0 16px;">
  <h2>Hospital Management System</h2>
  <p>Welcome to your dashboard <strong><?php echo $name; ?></strong>, Here is your current details -</p>
<p>Name: <strong><?php echo $name; ?></strong>
<p>Gender: <strong><?php echo $gender; ?></strong>
<p>Email: <strong><?php echo $username; ?></strong>
<p>Date of Birth: <strong><?php echo $dob; ?></strong>
<p>Blood Group: <strong><?php echo $blood; ?></strong>
<p>Address: <strong><?php echo $address1 . ' ' . $address2; ?></strong>
<p>City: <strong><?php echo $city; ?></strong>
<p>District: <strong><?php echo $district; ?></strong>
<p>State: <strong><?php echo $state; ?></strong>
<p>Country: <strong><?php echo $country; ?></strong>
<p>Phone: <strong><?php echo $phone; ?></strong>
  <p>Currently there are <strong><?php echo $roomcount; ?></strong> room(s) alloted to you.</p>
  
</div>




</body></html>
