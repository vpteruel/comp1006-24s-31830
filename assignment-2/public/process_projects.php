<?php
require 'db_connect.php';
session_start();

$alertClass = 'alert-success'; // Bootstrap alert class
$alertMessage = ''; // Message to display

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $employee_id = $_POST['employee_id'];
    $name = $_POST['name'];
    $start_date = $_POST['start_date'];
    $end_date = $_POST['end_date'] === '' ? null : $_POST['end_date'];
    $description = $_POST['description'] === '' ? null : $_POST['description'];

    $sql = "";

    if ($id > 0) {
        $sql = "UPDATE projects SET employee_id=?, name=?, start_date=?, end_date=?, description=? WHERE id=?";
    } else {
        $sql = "INSERT INTO projects (employee_id, name, start_date, end_date, description) VALUES (?, ?, ?, ?, ?)";
    }

    $stmt = $conn->prepare($sql);

    if ($id > 0) {
        $stmt->bind_param("issssi", $employee_id, $name, $start_date, $end_date, $description, $id);
    } else {
        $stmt->bind_param("issss", $employee_id, $name, $start_date, $end_date, $description);
    }

    if ($stmt->execute()) {
        $alertMessage = 'Record added successfully!';
    } else {
        $alertClass = 'alert-danger'; // Change alert class for error
        $alertMessage = 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Form Projects</title>
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
                            window.location.href = "view_projects.php";
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