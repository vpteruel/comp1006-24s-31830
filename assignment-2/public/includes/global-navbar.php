<?php
session_start();

// Get the full URL
$currentUrl = (empty($_SERVER['HTTPS']) ? 'http' : 'https') . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$employeesActive = '';
$projectsActive = '';

if (str_ends_with($currentUrl, '/form_employees.php') || str_ends_with($currentUrl, '/view_employees.php')) {
    $employeesActive = 'active';
} else if (str_ends_with($currentUrl, '/form_projects.php') || str_ends_with($currentUrl, '/view_projects.php')) {
    $projectsActive = 'active';
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
                <li class="nav-item dropdown <?php echo $employeesActive; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarEmployees" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Employees
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarEmployees">
                        <a class="dropdown-item" href="form_employees.php">Add new</a>
                        <a class="dropdown-item" href="view_employees.php">View all</a>
                    </div>
                </li>
                <li class="nav-item dropdown <?php echo $projectsActive; ?>">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarProjects" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Projects
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarProjects">
                        <a class="dropdown-item" href="form_projects.php">Add new</a>
                        <a class="dropdown-item" href="view_projects.php">View all</a>
                    </div>
                </li>
                <?php if (isset($_SESSION['userid'])) : ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['username'] ?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <!-- <a class="dropdown-item" href="profile.php">Profile</a>
                            <a class="dropdown-item" href="settings.php">Settings</a>
                            <div class="dropdown-divider"></div> -->
                            <a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="sign_in.php">Sign in</a>
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>