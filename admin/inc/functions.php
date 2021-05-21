<?php
    
    // Inser Slide
    function insertSlide($sl_title, $sl_img, $sl_des, $created_by, $db){
        
        $query  = "INSERT INTO sliders(slider_title, slider_img, slider_des, created_by, created_at) VALUES('$sl_title', '$sl_img', '$sl_des', '$created_by', NOW())";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Slider Added Succesfully")</script>';
            echo '<script>window.open("slider.php", "_self")</script>';
        }else{
            echo '<script>alert("Slider Added Failed")</script>';
        }
    }

    // Delete Slide
    function deleteSlide($db, $slide_id){
        $query  = "DELETE FROM sliders WHERE slider_id='$slide_id'";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Slide Deleted Successfully")</script>';
            echo '<script>window.open("slider.php", "_self")</script>';
        }else{
            echo '<script>alert("Slide Deletation Failed")</script>';
            echo '<script>window.open("slider.php", "_self")</script>';
        }
    }

    // Update Slide
    function updateSlide($update_title, $update_img, $update_des, $slide_id, $db){
        $query = "UPDATE sliders SET slider_title='$update_title', slider_img='$update_img', slider_des='$update_des' WHERE slider_id='$slide_id'";

        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Update Successful")</script>';
            echo '<script>window.open("slider.php", "_self")</script>';
        }else{
            echo '<script>alert("Update Failed")</script>';
        }
    }

    // Insert User
    function userCreate($user_full_name, $username, $user_email, $user_pass, $user_contact, $user_address, $userrole, $db){
        
        $query  = "INSERT INTO users(user_full_name, username, useremail, userpass, usercontact, useraddress, userrole, created_at) VALUES('$user_full_name', '$username', '$user_email', '$user_pass', '$user_contact', '$user_address', '$userrole', NOW())";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Registration Success.")</script>';
            echo '<script>window.open("users.php", "_self")</script>';
        }else{
            echo '<script>alert("Usr Registration Failed")</script>';
        }

    }
    
    // Delete User
    function deleteUser($db, $delete_user_id){
        $query  = "DELETE FROM users WHERE user_id='$delete_user_id'";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("User Deleted Successfully")</script>';
            echo '<script>window.open("users.php", "_self")</script>';
        }else{
            echo '<script>alert("User Deletation Failed")</script>';
            echo '<script>window.open("users.php", "_self")</script>';
        }
    }

    // Update User
    function updateUser($update_title, $update_img, $update_des, $slide_id, $db){
        $query = "UPDATE users SET slider_title='$update_title', slider_img='$update_img', slider_des='$update_des' WHERE slider_id='$slide_id'";

        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Update Successful")</script>';
            echo '<script>window.open("users.php", "_self")</script>';
        }else{
            echo '<script>alert("Update Failed")</script>';
        }
    }

    // Insert Category
    function insertCategory($category_name, $db){
        $query  = "INSERT INTO categorise(category_name) VALUES('$category_name')";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Category added successful.")</script>';
            echo '<script>window.open("categories.php", "_self")</script>';
        }else{
            echo '<script>alert("Category added Failed")</script>';
        }
    }

    // Update Category
    function updateCategory($category_id, $category_name, $db){
        $query = "UPDATE categorise SET category_name='$category_name' WHERE category_id='$category_id'";

        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Update Successful")</script>';
            echo '<script>window.open("categories.php", "_self")</script>';
        }else{
            echo '<script>alert("Update Failed")</script>';
        }
    }

    // Delete Category
    function deleteCategory($db, $category_id){
        $query  = "DELETE FROM categorise WHERE category_id='$category_id'";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Category Deleted Successfully")</script>';
            echo '<script>window.open("categories.php", "_self")</script>';
        }else{
            echo '<script>alert("Category Deletation Failed")</script>';
            echo '<script>window.open("categories.php", "_self")</script>';
        }
    }

    // Inser Portfolio
    function insertPortfolio($port_title, $port_des, $port_img, $port_link, $port_skills, $port_category, $created_by, $db){
        $query  = "INSERT INTO protfolios(port_title, port_des, port_img, port_link, port_skills, port_category, created_by, created_at) VALUES('$port_title', '$port_des', '$port_img', '$port_link', '$port_skills', '$port_category', '$created_by', NOW())";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Porfolio added successful.")</script>';
            echo '<script>window.open("portfolios.php", "_self")</script>';
        }else{
            echo '<script>alert("Porfolio added Failed")</script>';
        }
    }

    // Delete Portfolio
    function deletePortfolio($db, $portfolio_id){
        $query  = "DELETE FROM protfolios WHERE port_id='$portfolio_id'";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Portfolio Deleted Successfully")</script>';
            echo '<script>window.open("portfolios.php", "_self")</script>';
        }else{
            echo '<script>alert("Portfolio Deletation Failed")</script>';
            echo '<script>window.open("portfolios.php", "_self")</script>';
        }
    }
?>