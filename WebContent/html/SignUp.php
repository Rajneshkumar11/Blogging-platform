<?php
if(isset($_POST['SubmitButton'])){ 
	$fname = $_POST['firstname'];
	$lname = $_POST['lastname'];
	$uname = $_POST['username'];
	$email = $_POST['email'];
	$pswd = $_POST['password'];
	
	$servername = "localhost";
	$username = "root";
	$password = "root";
	$dbname = "mysql27db";

// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
	if ($conn->connect_error) {
	    die("Connection failed: " . $conn->connect_error);
	}
	$sql = "INSERT into user (fname , lname, username, email, password) values ('".$fname."', '".$lname."','".$uname."', '".$email."', '".$pswd."');";
	    
	if ($conn->query($sql) === TRUE) {
	    header("Location: login.php?status=user");
	} else {
  		header("Location: SignUp.php?status=taken");
	}
	$conn->close();
}    
?>
<html>
<head>
	<meta content="text/html;charset=utf-8" http-equiv="Content-Type">
	<meta content="utf-8" http-equiv="encoding">
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css"  href="../Css/signUp.css">
	<title>Sign Up</title>
	<script defer type="text/javascript" src="SignUp.js"></script>
</head>
<body background="bck1.jpg"> 
	<header >
		<div class="tab" >
			<div style="margin-top: auto; margin-bottom: auto;">
				<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
				<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
				  <a href = "home.php">HOME </a>
				  <a href = "write.php">WRITE BLOG</a>
				  <a href = "showBlog.html">COLLECTIONS</a>
				  
			</div>
			<div style="float: right;">
				<a href = "login.php" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>
			</div>
		</div>	
	</header>
	<section>
	<div id="error"></div>
	<form action="" id="form1" method="POST">
	<div class="form1">
		<br><br><br>
		<h1 align="center" class="text">Sign Up</h1>
		<h4 align="center" class="text">Start by creating your account</h4><br>
	
		<label for="firstname"><strong class="text">Firstname</strong></label><br>
		<input type="text" placeholder="Enter Firstname" name="firstname" id="firstname">
		<br>
	
		<label for="lastname"><strong class="text">Lastname</strong></label><br>
		<input type="text" placeholder="Enter lastname" name="lastname" id="lastname">
		<br>
	
		<label for="username"><strong class="text">Username</strong></label><br>
		<input type="text" placeholder="Enter username" name="username" id="username">
		<br>
	
		<label for="email"><strong class="text">Email</strong></label><br>
		<input type="text" placeholder="Enter Email" name="email" id="email">
		<br>
	
		<label for="password"><strong class="text">Password</strong></label><br>
		<input type="password" placeholder="Enter Password" name="password" id="password">
		<br>
	
		<label for="password"><strong class="text">Confirm Password</strong></label><br>
		<input type="password" placeholder="Enter Password" name="password2" id="password2">
		<br>
	
		<button type="reset">Cancel</button>
		<button type="submit" value="Submit" name="SubmitButton" >Submit</button><br>
		<a href="login.php"><h5 align="center" class="text">Log in if you have an existing account</h5></a>
		
	</div>	
	</form>
	</section>
	<footer >
		<div class="foot" align="left">
			<a href="tandc.xml" > Terms and condition</a>
			<a href="sitemap.php">Site map</a>
			<a href="FAQ.xml"> FAQs</a>
			<a href="contactus.php"> Contact us</a>
			<a href="aboutus.xml"> About us</a> 
		</div>

	</footer>
	<?php
			if($_GET['status']=="taken"){
				echo '<script>alert("Please choose different username!")</script>';
			}
	?>
</body>
</html>
