<?php

$msg = $_POST['msg'];
$name = $_POST['name'];

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

$sql = "INSERT into forum (name , text) values ('".$name."', '".$msg."');";
if ($conn->query($sql) === TRUE) {
    echo "Msg sent Successfully!";
} else {
    echo "Error: " . $sql;
}

$conn->close();
?>
