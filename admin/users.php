<?php include('templates/header.php'); ?>
    <section class="users-content-area py-4 px-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <ul class="nav nav-tabs" id="userTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="all-users" data-bs-toggle="tab" href="#user-home" role="tab" aria-controls="user-home" aria-selected="true">All Users</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="addnew-user" data-bs-toggle="tab" href="#addnewuser" role="tab" aria-controls="addnewuser" aria-selected="false">Add New</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="UsersManagement">

                        <div class="tab-pane fade show active" id="user-home" role="tabpanel" aria-labelledby="all-users">

                            <table class="table table-bordered border-success table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Password</th>
                                        <th>Conatct</th>
                                        <th>Address</th>
                                        <th>Role</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $row_per_page = 10;
                                                                                    
                                        $nor_query = "SELECT*FROM users";
                                        $nor_result = mysqli_query($db, $nor_query);
                                        $number_of_rows = mysqli_num_rows($nor_result);

                                        $number_of_pages = ceil($number_of_rows / $row_per_page);

                                        if(isset($_GET['page_number'])){
                                            $current_page_number = $_GET['page_number'];
                                        }else{
                                            $current_page_number = 1;
                                        }

                                        $row_offset = ($current_page_number - 1) * $row_per_page;

                                        $show_query = "SELECT*FROM users LIMIT {$row_per_page} OFFSET {$row_offset}";
                                        $show_result = mysqli_query($db, $show_query);

                                        if(mysqli_num_rows($show_result) > 0){
                                            while($show = mysqli_fetch_assoc($show_result)){
                                                echo '
                                                    <tr>
                                                        <td>'.$show['user_id'].'</td>

                                                        <td>'.$show['user_full_name'].'</td>

                                                        <td>'.$show['username'].'</td>

                                                        <td>'.$show['useremail'].'</td>

                                                        <td>'.$show['userpass'].'</td>

                                                        <td>'.$show['usercontact'].'</td>

                                                        <td>'.$show['useraddress'].'</td>

                                                        <td>'.$show['userrole'].'</td>

                                                        <td class="text-center">

                                                            <a href="" class="btn btn-outline-info btn-sm"><i class="far fa-eye"></i></a>

                                                            &nbsp;

                                                            <a href="update.php?update_user='.$show['user_id'].'" class="btn btn-outline-warning btn-sm"><i class="far fa-edit"></i></a>

                                                            &nbsp;

                                                            <a href="'.$template_path.'.php?delete_user='.$show['user_id'].'" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                            
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <tr>
                                                    <td colspan="5" class="text-center text-danger">No data found!!</td>
                                                </tr>
                                            ';
                                        }
                                    ?>
                                    
                                </tbody>
                            </table>

                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                <?php
                                    if($current_page_number == 1){
                                        echo '
                                            <li class="page-item disabled"><a class="page-link" href="#">First Page</a></li>
                                            <li class="page-item disabled"><a class="page-link" href="#">Previous</a></li>
                                        ';
                                    }else{
                                        $prev_page = $current_page_number - 1;
                                        echo '
                                            <li class="page-item"><a class="page-link" href="users.php?page_number=1">First Page</a></li>
                                            <li class="page-item"><a class="page-link" href="users.php?page_number='.$prev_page.'">Previous</a></li>
                                        ';
                                    }
                                ?>

                                <?php
                                    for($page_number = 1; $page_number <= $number_of_pages; $page_number++){
                                        echo '<li class="page-item"><a class="page-link" href="users.php?page_number='.$page_number.'">'.$page_number.'</a></li>';
                                    }
                                ?>

                                <?php
                                    if($current_page_number == $number_of_pages){
                                        echo '
                                            <li class="page-item disabled"><a class="page-link" href="#">Next</a></li>
                                            <li class="page-item disabled"><a class="page-link" href="#">Last Page</a></li>
                                        ';
                                    }else{
                                        $nxt_page =  $current_page_number + 1;
                                        echo '
                                            <li class="page-item"><a class="page-link" href="users.php?page_number='.$nxt_page.'">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="users.php?page_number='.$number_of_pages.'">Last Page</a></li>
                                        ';
                                    }
                                ?>

                                </ul>
                            </nav>
                            
                        </div>

                        <div class="tab-pane fade" id="addnewuser" role="tabpanel" aria-labelledby="addnew-user">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="mt-3">
                                <div class="row">
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="user_full_name" class="form-label">Full Name</label>
                                            <input type="text" name="user_full_name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="username" class="form-label">Username*</label>
                                            <input type="text" name="username" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-4">
                                        <div class="mb-3">
                                            <label for="user_email" class="form-label">Email*</label>
                                            <input type="email" name="user_email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="user_contact" class="form-label">Contact Number</label>
                                            <input type="number" name="user_contact" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="user_pass" class="form-label">Password*</label>
                                            <input type="password" name="user_pass" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="user_address" class="form-label">Address</label>
                                            <input type="text" name="user_address" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="user_signup_req" class="btn btn-outline-success">Sign Up</button>
                                    </div>
                                </div>
                                
                            </form>

                        </div>

                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php

        // Insert user
        if(isset($_POST['user_signup_req'])){
            $user_full_name = $_POST['user_full_name'];
            $username       = $_POST['username'];
            $user_email     = $_POST['user_email'];
            $user_pass      = $_POST['user_pass'];
            $user_contact   = $_POST['user_contact'];
            $user_address   = $_POST['user_address'];
            $userrole       = 'visitor';

            userCreate($user_full_name, $username, $user_email, $user_pass, $user_contact, $user_address, $userrole, $db);
        }

        // Delete user
        if(isset($_GET['delete_user'])){
            $delete_user_id = $_GET['delete_user'];

            deleteUser($db, $delete_user_id);
        }
    ?>
<?php include('templates/footer.php'); ?>