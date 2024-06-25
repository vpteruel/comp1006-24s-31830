<?php
// Get the full URL
$currentUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$addContentActive = '';
$viewContentActive = '';

if (str_ends_with($currentUrl, '/add_content.php')) {
    $addContentActive = 'active';
} else if (str_ends_with($currentUrl, '/view_content.php')) {
    $viewContentActive = 'active';
}
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">
            <img src="images/employee-logo.png" width="30" height="30" class="d-inline-block align-top" alt="Logo">
            Employee Portal
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php echo $addContentActive; ?>">
                    <a class="nav-link" href="add_content.php">Add Hours</a>
                </li>
                <li class="nav-item <?php echo $viewContentActive; ?>">
                    <a class="nav-link" href="view_content.php">View Hours</a>
                </li>
            </ul>
        </div>
    </div>
</nav>