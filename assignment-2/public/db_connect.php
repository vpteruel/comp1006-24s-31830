<?php
$servername = getenv('DB_SERVER') ?: 'sql206.infinityfree.com';
$username = getenv('DB_USERNAME') ?: 'if0_36254810';
$password = getenv('DB_PASSWORD') ?: 'igKP3W6nVwS';
$dbname = getenv('DB_NAME') ?: 'if0_36254810_employee_portal_db';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// UTF-8 encoding to ensure data consistency
$conn->set_charset("utf8mb4");
