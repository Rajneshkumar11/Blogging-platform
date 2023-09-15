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
	
	if(isset($_POST["changeButton"]))
	{
		$myuname = $_POST["username"];
		$mypwd = $_POST["np"];
		$myemail = $_POST["email"];
		if("" == trim($_POST['np']) and "" != trim($_POST['email'])){
			$sql = "update user set email = '$myemail' where username = '$myuname' ;";
		}
		else if("" == trim($_POST['email']) and "" != trim($_POST['np']) ){
			$sql = "update user set password = '$mypwd' where username = '$myuname' ;";
		}
		if ($conn->query($sql) === TRUE) {
	    	header("Location: login.php?status=user");
		} else {
		   header("Location: change_profile.php?status=invalid");
		}
		
	}
?>
<html >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel = "stylesheet" href= '../Css/change_profile.css'>
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Blog -change_profile</title>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous"></script>
			  
			  
	<script type="text/javascript">
		function ValidateEmail(mail) 
		{
	 	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(myForm.username.value))
	  	{
	   	 return (true)
	 	 }
	   	 alert("You have entered an invalid username!")
	   	 return (false)
		}
	</script>


			  
</head>
<body background="bck1.jpg" >
<body>
    <header >
		<div class="tab" >
			<div style="margin-top: auto; margin-bottom: auto;">
				<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
				<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
	  			<a href = "home.php">HOME </a>
		  			
				<?php 
	                if(isset($_SESSION["uname"])){ 
	                	echo '<a href = "write.php">WRITE BLOG</a>';
	                }
	                else{
	                	echo '<a href = "login.php?status=log">WRITE BLOG</a>';
	                }
	            ?> 
	        </div>
	        <div style="float: right; color = #ffffff;">
	        	<?php 
	   
	                if(isset($_SESSION["uname"])){ 
	                	echo '<a href="change_profile.php" title ="Edit Profile" >Hi, ' . $_SESSION["uname"] . '</a>'; 
	        			echo '<a href = "login.php?status=logout" title ="Logout" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>'
	        			
	                }else {
	                	echo '<a href="SignUp.php">SIGN UP</a>';
	                	echo '<a href = "login.php" title ="Login Here" ><img src="profile.png" height="28px" width="28px" alt="MyBlog logo"></img></a>'
	                }  
	  
	             ?>     
	        </div>
	      </div>  
      </header>
    
    
    
	
	
	<div id="error"></div>	
	<form  action="" name="myForm" method = "post" class="box" id="form1">
		<div class="form1">
		<h1 align="center" class="text">Edit Profile</h1>
		<br>
		<br>
		<label for="Username"><strong class="text">Enter Username</strong></label><br>
			<input type="text" placeholder="abc@gmail.com" name="username" id="username">
			<br>
			<label for="Change Password"><strong class="text">Change Password</strong></label><br>
			<input type="password" placeholder="Enter new Password" name="np" id="np">
			<br>
			<label for="Change email id"><strong class="text">Change email id</strong></label><br>
			<input type="text" placeholder="Enter new email id" name="email" id="email">
			<br>
			<button type="reset">Cancel</button>
		<button type="submit" name="changeButton" value="Submit" onclick=ValidateEmail(document.myForm.username.value)>Submit</button>
		</div>
	</form>	
		
		 <footer >
			<div class="foot" align="left">
				<a href="tandc.xml" > Terms and condition</a>
				<a href="sitemap.php">Site map</a>
				<a href="FAQ.xml"> FAQs</a>
				<a href="dummy.html"> Contact us</a>
				<a href="aboutus.xml"> About us</a> 
			</div>

	</footer>
	
	<?php
		if($_GET['status']=="invalid"){
			echo '<script>alert("Something went wrong Try again!")</script>';
		}
	?>
	</body>
</html> 
