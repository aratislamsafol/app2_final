<?php
    session_start();
    include('./inc/config.php');
    include('./inc/functions.php');
    include('./inc/objects.php');

    if(isset($_POST['user_login_req'])){
        $login_email    = $_POST['user_email'];
        $login_pass     = $_POST['user_pass'];

        $login_query    = "SELECT*FROM users WHERE useremail='$login_email' AND userpass='$login_pass'";
        $login_result   = mysqli_query($db, $login_query);

        if(mysqli_num_rows($login_result) == 1){
            $login_data     = mysqli_fetch_array($login_result);
            $userid         = $login_data['user_id'];
            $userfullname   = $login_data['user_full_name'];
            $username       = $login_data['username'];
            $useremail      = $login_data['useremail'];
            $userpass       = $login_data['userpass'];
            $user_role      = $login_data['userrole'];

            $_SESSION['user_id']    = $userid;
            $_SESSION['username']   = $username;
            $_SESSION['loggedin']   = $useremail;
            $_SESSION['user_role']  = $user_role;


            $user_token = md5($userpass);
            $up_query   = "UPDATE users SET login_token='$user_token' WHERE user_id='$userid'";
            $up_result  = mysqli_query($db, $up_query);

            setcookie('user_token', $user_token, time()+3600, '/');

            if(isset($_POST['remember_me'])){
                $user_token = md5($username);

                $up_query   = "UPDATE users SET login_token='$user_token' WHERE user_id='$userid'";
                $up_result  = mysqli_query($db, $up_query);

                setcookie('useremail', $useremail, time()+3600, '/');
                setcookie('userpass', $userpass, time()+3600, '/');
                setcookie('user_token', $user_token, time()+3600, '/');
                setcookie('remember_me', $_POST['remember_me'], time()+3600, '/');
            }else{
                if(!empty($_COOKIE['useremail'])){
                    setcookie('useremail', '', time()-3600, '/', false);
                }

                if(!empty($_COOKIE['userpass'])){
                    setcookie('userpass', '', time()-3600, '/', false);
                }

                if(!empty($_COOKIE['remember_me'])){
                    setcookie('remember_me', '', time()-3600, '/', false);
                }
            }

            echo '<script>window.open("index.php", "_self")</script>';
        }else{
            echo '<script>alert("Your username or Password is incorrect!!")</script>';
        }
    }

    if(isset($_COOKIE['user_token']) AND !empty($_COOKIE['user_token']) AND !empty($_COOKIE['remember_me'])){
        $login_email    = $_COOKIE['useremail'];
        $login_pass     = $_COOKIE['userpass'];
        $login_token    = $_COOKIE['user_token'];

        $login_query    = "SELECT*FROM users WHERE useremail='$login_email' AND userpass='$login_pass' AND login_token='$login_token'";
        $login_result   = mysqli_query($db, $login_query);

        if(mysqli_num_rows($login_result) == 1){
            $login_data     = mysqli_fetch_array($login_result);
            $userid         = $login_data['user_id'];
            $userfullname   = $login_data['user_full_name'];
            $username       = $login_data['username'];
            $useremail      = $login_data['useremail'];
            $userpass       = $login_data['userpass'];
            $user_role      = $login_data['userrole'];

            $_SESSION['user_id']    = $userid;
            $_SESSION['username']   = $username;
            $_SESSION['loggedin']   = $useremail;
            $_SESSION['user_role']  = $user_role;

            echo '<script>window.open("index.php", "_self")</script>';
        }else{
            echo '<script>alert("Please login again")</script>';
        }
    }

    if(isset($_COOKIE['user_token']) AND !empty($_COOKIE['user_token'])){
        $login_token    = $_COOKIE['user_token'];

        $login_query    = "SELECT*FROM users WHERE login_token='$login_token'";
        $login_result   = mysqli_query($db, $login_query);

        if(mysqli_num_rows($login_result) == 1){
            $login_data     = mysqli_fetch_array($login_result);
            $userid         = $login_data['user_id'];
            $userfullname   = $login_data['user_full_name'];
            $username       = $login_data['username'];
            $useremail      = $login_data['useremail'];
            $userpass       = $login_data['userpass'];
            $user_role      = $login_data['userrole'];

            $_SESSION['user_id']    = $userid;
            $_SESSION['username']   = $username;
            $_SESSION['loggedin']   = $useremail;
            $_SESSION['user_role']  = $user_role;

            echo '<script>window.open("index.php", "_self")</script>';
        }else{
            echo '<script>alert("Please login again")</script>';
        }
    }
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
        <!-- Header -->
        <header class="header-area bg-dark py-3">
            <div class="container">
                <div class="row">
                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="logo my-1">
                            <h3><a href="index.php">SIMPLE</a></h3>
                        </div>
                    </div>

                    <div class="col-6 col-sm-6 col-md-6 col-lg-6 col-xl-6 col-xxl-6">
                        <ul class="social-icon d-flex justify-content-center my-1">
                            <a href="" class="p-2 bd-highlight"><i class="fab fa-facebook-f"></i></a>
                            <a href="" class="p-2 bd-highlight"><i class="fab fa-twitter"></i></a>
                            <a href="" class="p-2 bd-highlight"><i class="fab fa-instagram"></i></a>
                        </ul>
                    </div>

                    <div class="col-3 col-sm-3 col-md-3 col-lg-3 col-xl-3 col-xxl-3">
                        <div class="search-bar my-1">
                            <form action="search.php" class="form-inline" method="POST">
                                <div class="input-group">
                                    <input type="text" name="search_key" class="form-control" placeholder="Search here...">
                                    <button class="btn btn-outline-secondary" type="submit" name="search_req"><i class="fas fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </header>

        <!-- Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-info py-1">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav" aria-controls="mainNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="mainNav">

                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#">Porfolio</a>
                        </li>
                    </ul>

                    <?php if(!isset($_SESSION['loggedin'])){ ?>
                        <ul class="navbar-nav ms-auto">
                            <span class="my-auto">Not login/signup yet?&nbsp;</span>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="#loginModal" class="btn btn-outline-light" data-bs-toggle="modal">Login</a>
                                <a href="#signupModal" class="btn btn-outline-light" data-bs-toggle="modal">Sing Up</a>
                            </div>
                        </ul>
                    <?php }else{ ?>
                        <ul class="navbar-nav ms-auto py-0">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle py-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false"><img src="https://via.placeholder.com/42x42" alt="" class="img-fluid rounded-circle"></a>
                                
                                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-dark" aria-labelledby="navbarDropdown">
                                    <li><a class="dropdown-item" href="admin/">Dashboard</a></li>
                                    <li><a class="dropdown-item" href="#">Profile</a></li>
                                    <li><hr class="dropdown-divider"></li>
                                    <li><a class="dropdown-item" href="templates/logout.php">Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    <?php } ?>
                </div>
            </div>
        </nav>