<?php
$comment = $_GET['comment'];
$discussid = $_GET['messageid'];

$mysqli01 = new mysqli("localhost","root","","ctubuddy");

// Check connection
if ($mysqli01 -> connect_errno) {
    echo "Failed to connect to MySQL: " . $mysqli01 -> connect_error;
    exit();
}

$result = $mysqli01 -> query("INSERT INTO comments(id, comm) VALUES ($discussid,'$comment')");

if ($result === TRUE) {
    echo "Votes Recorded: No = ".$discussid." Time = ".$comment;
} else {
    echo "Error: ".$mysqli01->error;
}

$mysqli01 -> close();
?>