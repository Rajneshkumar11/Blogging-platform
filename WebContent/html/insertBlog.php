<?php

$title = $_POST['btitle'];
$content = $_POST['bcontent'];
$collection = $_POST['bcol'];
$uid = $_POST['buid'];

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

$sql = "INSERT into blog (name , content, uid, collection) values ('".$title."', '".$content."',".$uid.",'".$collection."');";
if ($conn->query($sql) === TRUE) {
    echo "Blog Saved Successfully!";
} else {
    echo "Error: " . $sql;
}

$conn->close();
?>
