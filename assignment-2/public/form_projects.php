<?php
require 'db_connect.php';
session_start();

$row = array(
    "id" => "", 
    "employee_id" => "", 
    "name" => "",
    "start_date" => "",
    "end_date" => "",
    "description" => ""
);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, employee_id, name, start_date, end_date, description FROM projects WHERE id=?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();

    $result = $stmt->get_result();
    $row = $result->fetch_assoc();

    if (!$row) {
        echo "Record not found!";
        exit;
    }
}

$sqlEmployees = "SELECT id, name FROM employees";
$resultEmployees = $conn->query($sqlEmployees);
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
                <div class="card">
                    <div class="card-header">
                        Form Projects
                    </div>
                    <div class="card-body">
                        <form method="POST" action="process_projects.php">
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="employee_id">Select Employee</label>
                                <select class="form-control" id="employee_id" name="employee_id" required>
                                    <option value="">Select an employee</option>
                                    <?php if ($resultEmployees->num_rows > 0) : ?>
                                        <?php while ($rowEmployees = $resultEmployees->fetch_assoc()) : ?>
                                            <option value="<?php echo $rowEmployees['id']; ?>" <?php echo ($rowEmployees['id'] == $row['employee_id'] ? 'selected' : ''); ?>><?php echo htmlspecialchars($rowEmployees['name']); ?></option>
                                        <?php endwhile; ?>    
                                    <?php else : ?>
                                        <option value="">No employees found</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="start_date">Start date</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="<?php echo htmlspecialchars($row['start_date']); ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="end_date">End date</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="<?php echo htmlspecialchars($row['end_date']); ?>">
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control" id="description" name="description" rows="4"><?php echo htmlspecialchars($row['description']); ?></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <?php if (isset($id)) : ?>
                                <a href="view_projects.php" class="btn btn-danger">
                                    Cancel
                                </a>
                            <?php endif; ?>
                        </form>
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