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
      <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
			<p>
				This is my first webpage! I was able to code all the HTML and CSS in order to make it. Watch out world of web design here I come!
			</p>
			<p> 
				I can use my skills here to create websites for my business, my friends and family, my C.V, blog or articles. As well as any games or more experiment stuff (which is what the web is really all about). 
			</p>
		</div>
    <div id="footer1">
			<p>
				<a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
			</p>
		</div>
	</div>


</body>
</html>