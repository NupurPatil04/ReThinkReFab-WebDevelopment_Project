<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $email = $_POST['email'];
  
    
    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }
    
    // Database connection settings
    $servername = "localhost";
    $username = "if0_36251446";
    $password = "Gaurav1029";
    $dbname = "if0_36251446_project";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Insert data into the database
    $sql = "INSERT INTO aboutus (email) VALUES ('$email')";
    
    if ($conn->query($sql) === TRUE) {
        echo "You have successfully subscribed to our newsletter!";
    } else {
        echo "Error: " . $conn->error;
    }

    // Close connection
    $conn->close();
} else {
    echo "Invalid request";
}
?>