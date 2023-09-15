<?php
	session_start();
?>
<html>
<head>
	<link rel="stylesheet" type="text/css"  href="../Css/signUp.css">
	<title>Contact Us</title>
</head>
<body background = "bck1.jpg">
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
	<div>
		<br><br><br>
		<p><strong style="color: white;font-size: 50px;">Contact Us</strong></p><br>
		<h2><strong style="color: white">Mail us at :<a href="mailto:hiwarekar.atharva@gmail.com">Click here</a></strong></h2>
		<h2><strong style="color: white">Phone No : 9146185655</strong></h2>
	</div>
	<footer >
		<div class="foot" align="left">
			<a href="tandc.xml" > Terms and condition</a>
			<a href="sitemap.php">Site map</a>
			<a href="FAQ.xml"> FAQs</a>
			<a href="contactus.php"> Contact us</a>
			<a href="aboutus.xml"> About us</a> 
		</div>

	</footer>
</body>
</html>