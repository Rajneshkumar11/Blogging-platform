
<?php 
	$q = $_REQUEST["q"];
	$myob;
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
	$sql = "SELECT * from blog where name = '".$q."';";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
	    $row = $result->fetch_assoc();
	   	$myob->blog =$row["content"];
    	$myob->count =$row["hit"]; 
	} 
	$sql = "UPDATE blog SET hit = hit + 1  WHERE name = '".$q."';";
    $result = $conn->query($sql);
        
	$sql = "SELECT * from likedata where bname = '".$q."' and uid = ".$_REQUEST["uid"].";";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$myob->like = 'true';
	}
	$myJSON = json_encode($myob);
	echo $myJSON;

?> 
 
