<?php
    session_start();
    if(!isset($_SESSION['loggedin'])){
        echo '<script>alert("Please Login")</script>';
        echo '<script>window.open("../index.php", "_self")</script>';
    }
    include('./inc/config.php');
    include('./inc/functions.php');
    include('./inc/objects.php');

    // Get Template Path
    $template_path = basename($_SERVER['PHP_SELF'], '.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="./assets/css/all.min.css">
        <link rel="stylesheet" href="./assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="./assets/css/app.css">
    </head>
    <body>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-sm navbar-dark bg-dark py-1">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#dashNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="dashNav">
                    <ul class="navbar-nav me-auto dash-nav">

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Dashboard</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="slider.php">Slider</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="users.php">Users</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="portfolios.php">Porfolios</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="categories.php">Categories</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link text-primary" aria-current="page" href="../" target="_blank">Visit Site&nbsp;<i class="far fa-eye"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto py-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://via.placeholder.com/42x42" alt="" class="img-fluid rounded-circle"></a>
                            
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Profile</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="templates/logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>

                    

                </div>
            </div>
        </nav>