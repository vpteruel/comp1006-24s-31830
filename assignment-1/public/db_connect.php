<?php
$servername = "mysql";
$username = "user_app";
$password = "J5E7oPNxK9EaaozTL9YP";
$dbname = "employee_portal_db";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// UTF-8 encoding to ensure data consistency
$conn->set_charset("utf8mb4");
