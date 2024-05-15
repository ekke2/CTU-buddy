<?php
$message = $_GET['message'];
$thename = $_GET['thename'];

$mysqli01 = new mysqli("localhost", "root", "", "ctubuddy");

if ($mysqli01 -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli01 -> connect_error;
    exit();
}

$result = $mysqli01 -> query("INSERT INTO discussion('name', 'message') VALUES ('$message','$thename')");

if ($result === TRUE) {
    echo "Votes Recorded: No = ".$message." Time = ".$thename;
} else {
    echo "Error: ".$mysqli01->error;
}

$mysqli01 -> close();
?>
