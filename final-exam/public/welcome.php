<?php
require 'db_connect.php';
session_start();

// check if user is logged in and session is not expired
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

// session timeout logic
if (isset($_SESSION['last_activity']) && (time() - $_SESSION['last_activity']) > 900) { // 15 minutes
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit();
}

$_SESSION['last_activity'] = time();

// fetch user details
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Welcome to Employee Portal</title>
</head>

<body>

    <!-- Navigation Bar -->
    <?php
    include('includes/global-navbar.php');
    ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        Welcome, <?php echo htmlspecialchars($username); ?>!
                    </div>
                    <div class="card-body">
                        <p>This is the employee portal where you can manage other employee information.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php
    include('includes/global-footer.php');
    ?>

    <!-- Bootstrap JS and dependencies -->
    <?php
    include('includes/js-dependencies.php');
    ?>

</body>

</html>