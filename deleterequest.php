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
			<h1>Delete Request</h1>
			<?php
$con=mysqli_connect("127.0.0.1:54216","azure","6#vWHD_$","contact");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$id = $_GET['id'];

if (isset($_POST['submitted']))
{
	$choice = $_POST['choice'];

if ($choice == 0)
{
	
	header("Location:requests.php");
	exit;
}

if ($choice == 1)
{
	mysqli_query($con,"DELETE FROM `data` WHERE `USER_ID`=$id");
	
	header("Location:requests.php");
	exit;
}

}


mysqli_close($con);
?>
	   
	   <form id="delreq" name="delreq" method="post" action="">
	   <p>Are you sure you want to delete this request?</p>
	   <input id="choice" name="choice" type="radio" value="1" />&nbsp;Yes<br/> 
	   <input id="choice" name="choice" type="radio" value="0" checked/>&nbsp;No<br/><br/>
	   <td><input id="submitted" name="submitted" type="submit" value="Submit" />
	   <input id="submitted" name="submitted" type="hidden" value="true" />
		</div>
		
    <div id="footer1">
			<p>
				<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
			</p>
		</div>
	</div>


</body>
</html>