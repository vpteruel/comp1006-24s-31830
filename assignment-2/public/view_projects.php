<?php
require 'db_connect.php';
session_start();

$sql = "SELECT p.id, p.employee_id, e.name as employee_name, p.name, p.start_date, p.end_date FROM projects p INNER JOIN employees e ON (p.employee_id=e.id)";
$result = $conn->query($sql);
$conn->close();

$disabled = isset($_SESSION['userid']) ? '' : 'disabled';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>View Projects</title>
</head>

<body>

    <!-- Navigation Bar -->
    <?php
    include('includes/global-navbar.php');
    ?>

    <!-- Main Content -->
    <div class="container mt-5 mb-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        View Employee
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Responsible</th>
                                    <th>Project</th>
                                    <th>Dates</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($row = $result->fetch_assoc()) : ?>
                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo htmlspecialchars($row['employee_name']); ?></td>
                                        <td><?php echo htmlspecialchars($row['name']); ?></td>
                                        <td>Start: <?php echo htmlspecialchars($row['start_date']); ?><br>End: <?php echo htmlspecialchars($row['end_date']); ?></td>
                                        <td>
                                            <a href="form_projects.php?id=<?php echo $row['id']; ?>" class="btn btn-warning btn-sm <?php echo $disabled; ?>">
                                                <i class="fas fa-pencil-alt"></i>
                                            </a>
                                            <a href="delete_projects.php?id=<?php echo $row['id']; ?>" class="btn btn-danger btn-sm <?php echo $disabled; ?>" onclick="return confirm('Are you sure you want to delete this record?');">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                                <?php if ($result->num_rows == 0) : ?>
                                    <tr>
                                        <td colspan="4">No records found</td>
                                        <td>
                                            <a href="form_projects.php" class="btn btn-primary btn-sm">
                                                <i class="fas fa-plus"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </tbody>
                        </table>
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