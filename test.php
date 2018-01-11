<?php

// $servername = "localhost";
// $username = "root";
// $password = "root";
// $dbname = "db_notifymecapn";

// // Create connection
// $conn = new mysqli($servername, $username, $password, $dbname);

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

include('includes/connection.php');

// prepare and bind
$stmt = $conn->prepare("INSERT INTO users (id, username, email, password, date_created) VALUES (NULL, ?, ?, ?, CURRENT_TIMESTAMP)");
$stmt->bind_param("sss", $username, $email, $password);

// set parameters and execute
$username = "John";
$email = "Doe";
$password = "john@example.com";
$stmt->execute();

$username = "Mary";
$email = "Moe";
$password = "mary@example.com";
$stmt->execute();

$username = "Julie";
$email = "Dooley";
$password = "julie@example.com";
$stmt->execute();

echo "New records created successfully";

$stmt->close();
$conn->close();

?>
