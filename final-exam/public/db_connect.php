<?php
$servername = getenv('DB_SERVER') ?: 'mysql';
$username = getenv('DB_USERNAME') ?: 'user_app';
$password = getenv('DB_PASSWORD') ?: 'J5E7oPNxK9EaaozTL9YP';
$dbname = getenv('DB_NAME') ?: 'employee_portal_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// UTF-8 encoding to ensure data consistency
$conn->set_charset("utf8mb4");
