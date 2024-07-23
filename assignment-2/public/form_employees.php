<?php
require 'db_connect.php';
session_start();

$row = array(
    "id" => "", 
    "name" => "", 
    "picture" => ""
);

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT id, name, picture FROM employees WHERE id=?";

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Form Employees</title>
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
                        Form Employees
                    </div>
                    <div class="card-body">
                        <form method="POST" action="process_employees.php" enctype="multipart/form-data">
                            <input type="hidden" id="id" name="id" value="<?php echo $row['id']; ?>">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($row['name']); ?>" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="picture">Picture</label>
                                <?php if ($row['picture']) : ?>
                                    <input type="hidden" class="form-control" id="current_picture" name="current_picture" value="<?php echo htmlspecialchars($row['picture']); ?>">
                                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*">
                                    <img src="<?php echo htmlspecialchars($row['picture']); ?>" alt="Employee Picture" class="img-thumbnail border-0 mt-2" width="100">
                                <?php else : ?>
                                    <input type="file" class="form-control" id="picture" name="picture" accept="image/*" required>
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Save
                            </button>
                            <?php if (isset($id)) : ?>
                                <a href="view_employees.php" class="btn btn-danger">
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