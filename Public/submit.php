<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the input values from the form
    $name = $_POST['namearea'];
    $message = $_POST['messarea'];

    // Create a database connection (modify these parameters as needed)
    $mysqli = new mysqli("localhost", "root", "", "ctubuddy");

    // Check if the connection was successful
    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySQL: " . $mysqli->connect_error;
        exit();
    }

    // Prepare and execute the SQL query to insert data into the table
    $stmt = $mysqli->prepare("INSERT INTO discussion (name, message, curr_date) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $name, $message);

    if ($stmt->execute()) {
        echo "Message successfully inserted!";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the database connection
    $stmt->close();
    $mysqli->close();
} else {
    // Handle cases where the form is not submitted
    echo "Form not submitted.";
}
?>
