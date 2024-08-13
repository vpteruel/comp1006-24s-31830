<?php
require 'db_connect.php';
session_start();
define('PASSWORD_DEFAULT', "FnrxYo8M");

$error = "";
$success = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // validate form inputs
    if (empty($username) || empty($email) || empty($password)) {
        $error = "All fields are required.";
    } else {
        // check if username or email already exists
        $sql = "SELECT id FROM users WHERE username=? OR email=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $error = "Username or email already taken.";
        } else {
            // insert new user
            $sql = "INSERT INTO users (username, email, password) VALUES (?, ?, ?)";

            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $username, $email, $hashed_password);

            if ($stmt->execute()) {
                $_SESSION['username'] = $username;
                setcookie("username", $username, time() + (30 * 24 * 60 * 60), "/"); // 1 month
                header("Location: welcome.php?register=success");
                exit();
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        }
        $stmt->close();
    }
}

$conn->close();
