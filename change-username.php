<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$new_username = $confirm_username = "";
$new_username_err = $confirm_username_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate new password
    if(empty(trim($_POST["new_username"]))){
        $new_username_err = "Please enter the new username.";     
    } elseif(strlen(trim($_POST["new_username"])) < 6){
        $new_password_err = "Username must have atleast 6 characters.";
    } else{
        $new_username = trim($_POST["new_username"]);
    }
    
    // Validate confirm username
    if(empty(trim($_POST["confirm_username"]))){
        $confirm_username_err = "Please confirm the username.";
    } else{
        $confirm_username = trim($_POST["confirm_username"]);
        if(empty($new_username_err) && ($new_username != $confirm_username)){
            $confirm_username_err = "Username did not match.";
        }
    }
        
    // Check input errors before updating the database
    if(empty($new_username_err) && empty($confirm_username_err)){
        // Prepare an update statement
        $sql = "UPDATE users SET username = ? WHERE id = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "si", $param_username, $param_id);
            
            // Set parameters
            $param_username = $new_username;
            $param_id = $_SESSION["id"];
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
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
      <h1>Change Username</h1>
        <p>Please fill out this form to change your username.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post"> 
            <div class="form-group <?php echo (!empty($new_username_err)) ? 'has-error' : ''; ?>">
                <label>New Username</label>
                <input type="username" name="new_username" class="form-control" value="<?php echo $new_username; ?>">
                <span class="help-block"><?php echo $new_username_err; ?></span>
            </div>
            <div class="form-group <?php echo (!empty($confirm_username_err)) ? 'has-error' : ''; ?>">
                <label>Confirm Username</label>
                <input type="username" name="confirm_username" class="form-control">
                <span class="help-block"><?php echo $confirm_username_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="settings.php">Cancel</a>
            </div>
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