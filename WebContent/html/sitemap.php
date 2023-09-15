<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Css/sitemap.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


   
	<title>Blog - sitemap</title>
</head>
<body background="bck1.jpg" >
<body >
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
              <a href = "discussion.php">FORUM </a>
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
      <section>
      <main>
      <h2 align="center" class="heading">Blogging Platform SiteMap	</h2>
      
      <div class="line"></div>
      
      <article class="sitemap">
       <h2 align="left" class="text1">Account</h2>
      <div class="middle" align="left">
      <a href="" >Sign-Up</a><br><br>
       <a href=" " > Login</a><br><br>
        <a href=" " >Edit-profile</a><br><br>  
        </div>
        
        
      <h2 align="left" class="text1">Services</h2>
      <div class="middle" align="left">
      <a href="home.php" >Home</a><br><br>
       <a href=" " > Write Blog</a><br><br>
        <a href=" " >Read Blog</a><br><br>  
       </div> 
       
        <h2 align="left" class="text1">About Myblog.com</h2>
      <div class="middle" align="left">
      <a href=" " >About Us</a><br><br> 
        </div>
        
        <h2 align="left" class="text1">Terms and conditions of Myblog.com</h2>
      <div class="middle" align="left">
      <a href=" " >Terms and Conditions</a><br><br> 
        </div>
        
        
        <h2 align="left" class="text1">Support</h2>
      <div class="middle" align="left">
      <a href=" " >Contact Support</a><br><br>
       <a href=" " >FAQ</a><br><br>
        <a href=" " >Site-Map</a><br><br>  
        </div>
        </article>
      </main>
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
</body>
</html>
    
