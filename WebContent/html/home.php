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
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../Css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel = "stylesheet" href= '../Css/back.css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


   
	<title>Blog - Home</title>
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
    
    <main>
        <section class="presentation">
            <div class="introduction">
                <div class="intro-text">
                    <h1 style="font-family:sans-serif;">BLOG-MASTER</h1>
                    <p style="font-family:sans-serif;">Your platform for blogging !!!</p>
                </div>
					                
                <div class="btn">
                    <a href= "write.php">
                    <button class="btn-explore" style="border: none;cursor: pointer;font-size: 15px;width: 100px;height: 50px;color: white; margin: 20px 20px;background-color: #4CAF50;">Write</button>
                    </a>
                    <a href="#read">
					<button class="btn-explore" style="border: none;cursor: pointer;font-size: 15px;width: 100px;height: 50px;color: white; margin: 20px 20px;background-color: #4CAF50;">Read</button>
               		</a>
                </div>
            </div>
            <div class="cover">
                <img src="index.jpeg" >
            </div>
        </section>
        
        <section class="readblog" id="read" style="position: relative;">
			
			<div id="logo">
		     	<div>
		     		<div  style="float:right;">
		     			<button onclick="closeBlog()" >X</button>
		     		</div>
		     		<div align-self="middle">
		     			<h1 id= "btitle"></h1>
		     		</div>
		     	</div>
		     	<br>
		     	<p align= "left" id = "bcontent"></p>
		     	<div style="position: absolute; bottom : 15px; display: flex;">
		     		<button id="like"  onclick = "changeLike()"><img id = "likesym" src="beflike.png"  height="20px" width="20px"></button>
		     		<span style="margin-left: 5px;" id="liketext">Like </span>
		     		<div style="float: right;">
		     			<span style="margin-left: 15px;">Views : </span>
		     			<span id="viewCount" >123</span>
		     		</div>
		     	</div>
      		</div>
			
			<div class="nature">
       			<h1 class="type">Nature</h1>
      		</div>
     		
     		<div class="blog">
   		      	<?php
					$sql = "SELECT * from blog where collection = 'Nature';";
					$result = $conn->query($sql);
		
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	echo "<input type= 'button' value = '".$row["name"]."' onClick = 'dispBlog(this.value)' class='btn-two'>";
					    }
					} else {
					    echo "Err";
					}
				?> 
	      	</div>

			<br />
			<br />	
			
			<h1 class="type">Sports</h1>
			<div class="blog">
			   	<?php
					$sql = "SELECT * from blog where collection = 'Sports';";
					$result = $conn->query($sql);
			
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    	echo "<input type= 'button' value = '".$row["name"]."' onClick = 'dispBlog(this.value)' class='btn-two'>";
					    }
					} else {
					    echo "Err";
					}
			
			 	?> 
			</div>
			
		  	<br />
		  	<br />
			
			<h1 class="type">Entertainment</h1>
			<div class="blog">
			  	<?php
					$sql = "SELECT * from blog where collection = 'Entertainment';";
					$result = $conn->query($sql);
			
					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					    echo "<input type= 'button' value = '".$row["name"]."' onClick = 'dispBlog(this.value)' class='btn-two'>";
					    }
					} else {
					    echo "Err";
					}
				?> 
			</div>			
        </section>
    </main>


	<script>
		function dispBlog(val) {
			var xmlhttp;
		  	xmlhttp = new XMLHttpRequest();
		  
		  	xmlhttp.onreadystatechange = function() { 
		  		if (this.readyState == 4 && this.status == 200) {
    				var myObj = JSON.parse(this.responseText);
		     		document.getElementById("bcontent").innerHTML  = myObj.blog;
		      		document.getElementById("btitle").innerHTML =val;
		      	 	document.getElementById("logo").style.visibility = "visible";	      	 	
	     		 	document.getElementById('viewCount').innerHTML=myObj.count;
		      		if(myObj.like == 'true'){
		      		 	document.getElementById('likesym').src='aflike.jpeg';
		      		 	document.getElementById('liketext').innerHTML='Liked';
		      		}
		      	 	else{
		      			document.getElementById('likesym').src='beflike.png';
		      				document.getElementById('liketext').innerHTML='Like';
		      		}
		    	}
		  	};
		   	xmlhttp.open("GET", "getBlog.php?q=" + val+"&uid="+<?php echo $_SESSION["id"]; ?>, true);
        	xmlhttp.send();
		}
		
		function closeBlog(){
			document.getElementById("logo").style.visibility = "hidden";
		}
		
		function changeLike(){
			document.getElementById('likesym').src='aflike.jpeg';
   		 	document.getElementById('liketext').innerHTML='Liked';
		
		}
		</script>



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
    
