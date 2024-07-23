<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('includes/head.php');
    ?>
    <title>Sign up</title>
</head>

<body>

    <!-- Navigation Bar -->
    <?php
    include('includes/global-navbar.php');
    ?>

    <!-- Main Content -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 offset-md-4">
                <div class="card">
                    <div class="card-header">
                        Sign up
                    </div>
                    <div class="card-body">
                        <form id="signupForm" method="POST" action="process_sign_up.php">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                            </div>
                            <div class="form-group">
                                <div id="alert-container"></div>
                            </div>
                            <button type="submit" class="btn btn-primary">Sign up</button>
                        </form>
                    </div>
                </div>
                <div class="mt-3">
                    <p>Already have an account? <a href="sign_in.php">Sign in here</a></p>
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

    <script>
        function showAlert(message, type) {
            var alertHtml = '<div class="alert alert-' + type + ' alert-dismissible fade show" role="alert">' +
                message +
                '<button type="button" class="close" data-dismiss="alert" aria-label="Close">' +
                '<span aria-hidden="true">&times;</span>' +
                '</button>' +
                '</div>';
            $('#alert-container').html(alertHtml);
        }

        $(document).ready(function() {
            $('#signupForm').on('submit', function(e) {
                var password = $('#password').val();
                var confirm_password = $('#confirm_password').val();
                if (password !== confirm_password) {
                    e.preventDefault(); // Prevent form submission
                    showAlert('Passwords do not match.', 'danger');
                }
            });
        });
    </script>
</body>

</html>