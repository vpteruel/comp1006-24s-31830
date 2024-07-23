<?php
require 'db_connect.php';
session_start();

$alertClass = 'alert-success'; // Bootstrap alert class
$alertMessage = ''; // Message to display

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $picture_path = '';

    if ($_FILES['picture']['error'] !== UPLOAD_ERR_NO_FILE) {

        $target_dir = "uploads/";
        $imageFileType = strtolower(pathinfo($_FILES["picture"]["name"], PATHINFO_EXTENSION));
        $unique_filename = uniqid('', true) . '.' . $imageFileType;
        $target_file = $target_dir . $unique_filename;
        $uploadOk = 1;

        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["picture"]["tmp_name"]);
        if ($check === false) {
            echo "File is not an image.";
            $uploadOk = 0;
        }

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($_FILES["picture"]["size"] > 500000) { // 500KB
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg'])) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($_FILES["picture"]["error"] > 0) {
            switch ($_FILES["picture"]["error"]) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "The uploaded file was only partially uploaded.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "No file was uploaded.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "Missing a temporary folder.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo "Failed to write file to disk.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo "File upload stopped by extension.";
                    break;
                default:
                    echo "Unknown upload error.";
                    break;
            }
            $uploadOk = 0;
        } else {
            if (move_uploaded_file($_FILES["picture"]["tmp_name"], $target_file)) {
                $picture_path = $target_file;
                // echo "The file " . htmlspecialchars(basename($_FILES["picture"]["name"])) . " has been uploaded.";
            } else {
                echo "Sorry, there was an error uploading your file.";
                // Debugging output
                echo "<br>Debug info:<br>";
                echo "Error code: " . $_FILES["picture"]["error"];
            }
        }
    }
    else
        $picture_path = $_POST['current_picture'];

    $sql = "";

    if ($id > 0) {
        $sql = "UPDATE employees SET name=?, picture=? WHERE id=?";
    } else {
        $sql = "INSERT INTO employees (name, picture) VALUES (?, ?)";
    }

    $stmt = $conn->prepare($sql);

    if ($id > 0) {
        $stmt->bind_param("ssi", $name, $picture_path, $id);
    } else {
        $stmt->bind_param("ss", $name, $picture_path);
    }

    if ($stmt->execute()) {
        $alertMessage = 'Record saved successfully!';
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
                            window.location.href = "view_employees.php";
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