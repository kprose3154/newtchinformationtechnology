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

	<div id="page">
		<div id="logo">
                  
                  <h1><img src="logo.png" alt="KPLink Logo" style="width:300px;height:60px;border:0;"></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="welcome.php">Home</a></li>
        		<li><a href="requests.php">Requests</a></li>
				<li><a href="settings.php">Settings</a></li>
					<li><a href="logout.php">Logout</a></li>
      </ul>	
		</div>
		<div id="content">
			<h1>Edit Information</h1>
			<?php
$con=mysqli_connect("127.0.0.1:54216","azure","6#vWHD_$","login");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE (id = $id)";
$result = mysqli_query($con,$query);

while($row=mysqli_fetch_assoc($result))
{
	$ifirstname = $row['firstname'];
	$ilastname = $row['lastname'];
	$iphone = $row['phone'];
	$iemail = $row['email'];
	$icity = $row['city'];
	$izipcode = $row['zipcode'];
}

if (isset($_POST['submitted']))
{
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$email = $_POST['email'];
	$phone = $_POST['phone'];

mysqli_query($con,"UPDATE users SET firstname='$firstname',lastname='$lastname',phone='$phone',email='$email',city='$city',zipcode='$zipcode' WHERE id='$id'");
  
  header("Location:settings.php");
  exit;
  
}

mysqli_close($con);
?>
	
<form id='editinfo' name='editinfo' method='post' action=''>
	   <table cellspacing='0' cellpadding='5' border='0'>
		<tr>
		<td>First Name</td>
		<td><input id='firstname' name='firstname' type='text' style='display:block' value=<?php echo $ifirstname;?>></td>
		</tr>
		<tr>
		<td>Last Name</td>
		<td><input id='lastname' name='lastname' type='text' style='display:block' value=<?php echo $ilastname;?>></td>
		</tr>
		<tr>
		<td>Phone Number</td>
		<td><input id='phone' name='phone' type='text' style='display:block' value=<?php echo $iphone;?>></td>
		</tr>		
		<tr>
		<td>Email Address</td>
		<td><input id='email' name='email' type='text' style='display:block' value=<?php echo $iemail;?>></td>
		</tr>
		<tr>
		<td>City</td>
		<td><input id='city' name='city' type='text' style='display:block' value=<?php echo $icity;?>></td>
		</tr>
		<tr>
		<td>Zip Code</td>
		<td><input id='zipcode' name='zipcode' type='text' style='display:block' value=<?php echo $izipcode;?>></td>
		</tr>
		</table>
	  <input id='submit' name='submit' type='submit' value='Save' style='display:block'>
	  <button type="reset" value="Reset">Reset</button>
	  <a class="btn btn-link" href="requests.php">Cancel</a>
	  <input id='submitted' name='submitted' type='hidden' value='true' style='display:block'/>
	  </form>
		</div>

    <div id="footer1">
			<p>
				<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
			</p>
		</div>
	</div>


</body>
</html>