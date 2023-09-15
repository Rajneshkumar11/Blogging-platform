<?php
	session_start();
?>

<?php
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
	
	if(isset($_POST["submit1"]))
	{
		$myuname = $_POST["uname"];
		$mypwd = $_POST["pswd"];
		$sql = "SELECT * FROM user WHERE username = '$myuname' and password = '$mypwd'";
		$result = $conn->query($sql);
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$_SESSION['uname'] = $myuname;
				$_SESSION['id']=$row["id"];
				header("location: home.php");
			}
		}
		
		else{
			header("location: login.php?status=invalid");
		}
	}
?>
<html>
	<head>
		<link rel = "stylesheet" type="text/css" href= '../Css/login.css'>
		<title>myblog/login</title>

		<script type="text/javascript">
			function ValidateEmail() {
		 		if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.uname.value)){
		 			
		   	 		return (true)
		 	 	}
		   	 	alert("Please enter valid email id in (xyz@abc.com)")
		   	 	return (false)
			}
		</script>
	</head>
	<body background="bck1.jpg" >
		<header >
			<div class="tab" >
				<div style="margin-top: auto; margin-bottom: auto;">
					<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
					<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
		  			<a href = "home.php">HOME </a>
		  			<a href = "login.php?status=log">WRITE BLOG</a>
		  			
				</div>
				<div style="float: right;">
					<a href = "login.php" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>
				</div>
			</div>	
	   	</header>
		
		<form name="myForm" method = "post" action="">
				<div>
					<h1 align="center" class="text">Login</h1>
					<br>			
					<label for="uname"><strong class="text">Enter Username</strong></label><br>
					<input type="text" placeholder="Enter username" name="uname" required>
					<br>
					<label for="psw"><strong class="text">Password</strong></label><br>
					<input type="password" placeholder="Enter Password" name="pswd">
					<br>
				</div>
				<div>
					<button type="submit"  name="submit1" style= "margin-right : 15px"  onclick="return ValidateEmail();">
							Login
					</button>
					<button type="button" >
	    				Cancel
	    			</button>
				</div>
	   			<div>
	   				<a href="change_profile.php"><h5 align="center" class="text">Forgot password?</h5></a>
	   				<h3 align="center" class="text"> New user?</h3>
	   				<a href="SignUp.php"><h5 align="center" class="text">Signup here</h5></a><br>
	   				
	   			</div>
	 			
		</form>

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
			if($_GET['status']=="invalid"){
				echo '<script>alert("Invalid Credentials!")</script>';
			}
			else if($_GET['status']=="user"){
				unset($_SESSION['uname']);
				unset($_SESSION['id']);
				echo '<script>alert("Details saved Sucessfully. Please Login again!")</script>';
				header("location: login.php");
			}
			else if($_GET['status']=="log"){
				echo '<script>alert("Please login for further access!")</script>';
			}
			else if($_GET['status']=="logout"){
				echo '<script>alert("Logout Successfully")</script>';
				unset($_SESSION['uname']);
				unset($_SESSION['id']);
				header("location: login.php");
			}
			
		?>
	</body>
</html>
