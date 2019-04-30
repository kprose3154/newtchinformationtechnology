<!DOCTYPE html>

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
                  
                  <h1><img src="logo.png" alt="Logo" style="width:300px;height:60px;border:0;"></h1>
		</div>
		<div id="nav">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="contact.php">Contact</a></li>
        			<li><a href="login.php">Login</a></li>
      </ul>	
		</div>
		<div id="content">
<h1>Contact</h1>

<?php
$con=mysqli_connect("127.0.0.1:54216","azure","6#vWHD_$","contact");
// Check connection
if (mysqli_connect_errno())
{
echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if (isset($_POST['submitted']))
{
	$lastname = $_POST['lastname'];
	$firstname = $_POST['firstname'];
	$city = $_POST['city'];
	$zipcode = $_POST['zipcode'];
	$email = $_POST['email'];
	$number = $_POST['number'];

mysqli_query($con,"INSERT INTO data (USER_FIRST_NAME,USER_LAST_NAME,USER_PHONE_NUMBER,USER_EMAIL_ADDRESS,USER_CITY,USER_ZIP_CODE) VALUES ('$firstname','$lastname','$number','$email','$city','$zipcode')");
  
  header("Location:index.php");
  exit;
  
}

mysqli_close($con);
?>
	  
<form id="addcust" name="addcust" method="post" action=""
	   <table cellspacing="0" cellpadding="5" border="0">
		<tr>
		<td>First Name</td>
		<td><input id="firstname" name="firstname" type="text" style="display:block"/></td>
		</tr>
		<tr>
		<td>Last Name</td>
		<td><input id="lastname" name="lastname" type="text" style="display:block"/></td>
		</tr>
		<tr>
		<td>Phone Number</td>
		<td><input id="number" name="number" type="text" style="display:block"/></td>
		</tr>		
		<tr>
		<td>Email Address</td>
		<td><input id="email" name="email" type="text" style="display:block"/></td>
		</tr>
		<tr>
		<td>City</td>
		<td><input id="city" name="city" type="text" style="display:block"/></td>
		</tr>
		<tr>
		<td>Zip Code</td>
		<td><input id="zipcode" name="zipcode" type="text" style="display:block"/></td>
		</tr>
		<tr>
		<td><input id="submit" name="submit" type="submit" value="Submit" style="display:block"/></td>
		</tr>
		</table>
	  <input id="submitted" name="submitted" type="hidden" value="true" style="display:block"/>
	  </form>	

    <p1>

		</div>
  </body>
</html>
