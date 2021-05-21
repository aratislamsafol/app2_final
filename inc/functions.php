<?php
    // Insert User
    function userCreate($user_full_name, $username, $user_email, $user_pass, $user_contact, $user_address, $userrole, $db){
        
        $query  = "INSERT INTO users(user_full_name, username, useremail, userpass, usercontact, useraddress, userrole, created_at) VALUES('$user_full_name', '$username', '$user_email', '$user_pass', '$user_contact', '$user_address', '$userrole', NOW())";
        $result = mysqli_query($db, $query);

        if($result){
            echo '<script>alert("Registration Success. Please login")</script>';
            echo '<script>window.open("index.php", "_self")</script>';
        }else{
            echo '<script>alert("Usr Registration Failed")</script>';
        }

    }
    
?>