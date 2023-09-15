<?php
	session_start();
?>
<html>
	<head>
		<meta charset="utf-8"/>
		<link rel = "stylesheet" href= '../Css/write.css'>
		<title>myblog/writeBlog</title>
		
		<script
		  src="https://code.jquery.com/jquery-3.4.1.js"
			  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
			  crossorigin="anonymous">
  		</script>

		<script type="text/javascript">
			 function boldT() {
			 	document.execCommand('bold', false, null);
			 
			};
			function italicT() {
			 	document.execCommand('italic', false, null);
			 
			};
			function underlineT() {
			 	document.execCommand('underline', false, null);
			 
			};
		</script>
		
	</head>
	<body background="bck1.jpg" >
		<header >
			<div class="tab" >
				<div style="margin-top: auto; margin-bottom: auto;">
					<img src="logo.png" height="25px" width="25px" style= " margin-left: 15px; margin-top :5px;" alt="MyBlog logo" ></img>
					<span style="color: white; font-size: 22px;margin-left: 15px"> Myblog.com</span>
		  			<a href = "home.php">HOME </a>
		  			<a href = "write.php">WRITE BLOG</a>
		  			
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
	   	
	   	<div align = "left">
			<br><br><br>
			<strong style="margin-top: 20px; margin-left: 80px;">Select a theme for the blog</strong>
			<br>
			<select id="theme" required>
				<option id="nature" name="coll" value="Nature" for="nature">Nature</option>
				<option id="sports" name="coll" value="Sports" for="sports">Sports</option>
				<option id="entertainment" name="coll" value="Entertainment" for="entertainment">Entertainment</option>
			</select>
			<br>
			
			<input type = "text"  id="btitle" placeholder = "Insert Title here">
	   	
		   	<div class="wblog">
				<p style = " margin-top : 5px;" contentEditable="true" class = "blog" id="bcontent" placeholder="Start writing your blog here..." align="left">
				</p>
				<div  >
					<button type = "button" id = "jBold" onclick="boldT()" style= " font-size:20px; margin-left: 30px; font-weight: bold; " >B</button>
					<button type = "button" id = "jItalic" onclick="italicT()" style= "  font-size:20px; margin-left: 15px; font-style: italic;" >I</button>
					<button type = "button" id = "jUnderline" onclick="underlineT()" style= " font-size:20px; margin-left: 15px;text-decoration: underline;" >U</button>
				</div>
				
			</div>
			
		</div>
		<button class="subButton" type="submit" id="save" style = "margin-top:50px">Submit</button>
		
		<script type="text/javascript">
			$(document).ready(function(argument) {
				$('#save').click(function(){
					$content = $('#bcontent').html();
					$title = $('#btitle').val();
					$id = '<?php echo $_SESSION['id']; ?>'; 
					$col = $( "#theme option:selected" ).text();
					$.ajax({
						url: 'insertBlog.php',
						type: 'post',
						data: {
							bcontent: $content ,
							btitle: $title,
							bcol : $col,
							buid : $id
						},
						datatype: 'html',
						success: function(rsp){
							alert(rsp);
							}
					});
				});
			});
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
