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
      </ul>	
		</div>
		<div id="content">
			<h1>Requests</h1>
			<?php
$con=mysqli_connect("127.0.0.1:54216","azure","6#vWHD_$","contact");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$result = mysqli_query($con,"SELECT * FROM data");

echo "<table cellspacing='0' cellpadding='5' border='0'>
<tr>
<th>&nbsp;</th>
<th>&nbsp;</th>
<th>Request ID</th>
<th>First Name</th>
<th>Last Name</th>
<th>Phone Number</th>
<th>Email Address</th>
<th>City</th>
<th>Zip Code</th>
</tr>";

while($row = mysqli_fetch_array($result))
{
echo '<tr>';
echo '<td><a href="editrequest.php?id=' . $row['USER_ID'] . '">Edit</a></td>';
echo '<td><a href="deleterequest.php?id=' . $row['USER_ID'] . '">Delete</a></td>';
echo '<td>' . $row['USER_ID'] . '</td>';
echo '<td>' . $row['USER_FIRST_NAME'] . '</td>';
echo '<td>' . $row['USER_LAST_NAME'] . '</td>';
echo '<td>' . $row['USER_PHONE_NUMBER'] . '</td>';
echo '<td>' . $row['USER_EMAIL_ADDRESS'] . '</td>';
echo '<td>' . $row['USER_CITY'] . '</td>';
echo '<td>' . $row['USER_ZIP_CODE'] . '</td>';
echo '</tr>';
}
echo "</table>";

mysqli_close($con);
?>
		</div>
    <div id="footer1">
			<p>
				<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
			</p>
		</div>
	</div>


</body>
</html>