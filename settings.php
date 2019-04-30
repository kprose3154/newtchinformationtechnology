<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<html class="gr__kplinkserver_net"><head>
	
    <title>New Tech Information Technology Club</title>
	
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">

<!-- you should always add your stylesheet (css) in the head tag so that it starts loading before the page html is being displayed -->	
	<link rel="stylesheet" href="style.css" type="text/css">

</head>
<body data-gr-c-s-loaded="true">

<!-- webpage content goes here in the body -->

<?php
$con=mysqli_connect("127.0.0.1:54216","azure","6#vWHD_$","login");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_SESSION['id'];

$query = "SELECT * FROM users WHERE (id = $id)";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
	$username = $row['username'];
	$firstname = $row['firstname'];
	$lastname = $row['lastname'];
	$phone = $row['phone'];
	$email = $row['email'];
	$city = $row['city'];
	$zipcode = $row['zipcode'];
	$created = $row['created_at'];
}

?>
	<div id="page">
		<div id="logo">        
                  <h1><img src="logo.png" alt="KPLink Logo" style="width:300px;height:60px;border:0;"></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="welcome.php">Home</a></li>
        		<li><a href="requests.php">Requests</a></li>
				<li><a href="settings.php">Settings</a></li>
      </ul>	
		</div>
		<div id="content">
      <h1>Settings</h1>	
		<p><strong>Username:</strong> <?php echo $username; echo '<td><a href="change-username.php?id=' . $id . '"> Edit</a></td>'; ?></p>
		<a href="reset-password.php" class="btn btn-warning">Change Your Password</a>
		<br>
		<br>
		<p><strong>First Name:</strong> <?php echo $firstname;?></p>
		<p><strong>Last Name:</strong> <?php echo $lastname;?></p>
		<p><strong>Phone Number:</strong> <?php echo $phone;?></p>
		<p><strong>Email Address:</strong> <?php echo $email;?></p>
		<p><strong>City:</strong> <?php echo $city;?></p>
		<p><strong>Zip Code:</strong> <?php echo $zipcode;?></p>
		<?php echo '<td><a href="editinfo.php?id=' . $id . '">Edit</a></td>'; ?>
		<p><strong>Date Joined:</strong> <?php echo $created;?></p>
	
	</div>
    <div id="footer1">
			<p>
				<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
			</p>
		</div>
	


</body>
</html>