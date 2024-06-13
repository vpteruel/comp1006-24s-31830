<?php
include 'db_connect.php';

// Initialize variables for alert message
$alertClass = 'alert-success'; // Bootstrap alert class
$alertMessage = ''; // Message to display

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $hours_worked = $_POST['hours_worked'];

    // SQL query to insert data into database
    $sql = "INSERT INTO employees (name, hours_worked) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sd", $name, $hours_worked);

    // Execute query
    if ($stmt->execute()) {
        // Set alert message
        $alertMessage = 'Record added successfully!';
    } else {
        $alertClass = 'alert-danger'; // Change alert class for error
        $alertMessage = 'Error: ' . $sql . '<br>' . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee Hours</title>
    <link rel="icon" type="image/x-icon" href="/images/favicon.ico">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/style.css">
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
                <?php if (!empty($alertMessage)) : ?>
                    <div class="alert <?php echo $alertClass; ?> alert-dismissible fade show" role="alert">
                        <?php echo $alertMessage; ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <!-- Redirect after delay -->
                    <script>
                        setTimeout(function() {
                            window.location.href = "view_content.php";
                        }, 3000); // 3 second delay (3000 milliseconds)
                    </script>
                <?php endif; ?>
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