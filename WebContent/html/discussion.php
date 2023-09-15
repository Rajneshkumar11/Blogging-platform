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
    <link rel="stylesheet" href="../Css/back.css">
  
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>


   
	<title>Discussion Forum</title>
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



	<div id = "div1" align="left" style="margin-left:50px; margin-top: 100px; overflow-y: scroll; height:400px; width: 60%; padding: 20px; background-color: #FFFFFF;">
	
		<?php
			$sql = "SELECT * from forum;";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
			    // output data of each row
			    while($row = $result->fetch_assoc()) {
			    	if($row[name] == $_SESSION["uname"]){
			    		echo "<span  style='float : right;padding: 5px; background-color:#D4EBFF;' >".$row['text']."</span><br><br>";
			    	}
			    	else{
			    		echo "<span style = 'padding: 5px; background-color: #C0D7EB;'>".$row['name']." : ".$row['text']."</span><br><br>";
			    	}
			    }
			} 
		?>
	</div>
	<div align = "left">
		<input type = "text"  id="msg" style="margin-left:50px; margin-top: 20px; width: 60%; padding: 15px;" placeholder = "Add your message here..">
		<br>
		<button class="subButton" type="submit" id="save" style = "margin-top:15px">POST</button>
		
	
	</div>
	
	
	
	<script>
		
		$( document ).ready(function() {
			$('#div1').scrollTop($('#div1')[0].scrollHeight);    
		});
	</script>
	
	<script type="text/javascript">
			$(document).ready(function(argument) {
				$('#save').click(function(){
					$message = $('#msg').val();
					$uname = '<?php echo $_SESSION['uname']; ?>'; 
					$.ajax({
						url: 'sendmsg.php',
						type: 'post',
						data: {
							msg: $message ,
							name : $uname
						},
						datatype: 'html',
						success: function(rsp){
							location.reload(true);
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
    
