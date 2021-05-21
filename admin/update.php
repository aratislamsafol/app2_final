<?php include('templates/header.php'); ?>

    <!-- Slider update start -->
    <?php
        if(isset($_GET['update_slide'])){
            $get_slide_id   = $_GET['update_slide'];
            
            $show_query     = "SELECT*FROM sliders WHERE slider_id='$get_slide_id'";
            $show_result    = mysqli_query($db, $show_query);
            $show_data      = mysqli_fetch_array($show_result);
            
            $slide_id       = $show_data['slider_id'];
            $slide_title    = $show_data['slider_title'];
            $slide_img      = $show_data['slider_img'];
            $slide_des      = $show_data['slider_des'];
        }
    ?>

    <?php if(!empty($_GET['update_slide'])){ ?>

        <form action="update.php?update_slide=<?php echo $slide_id; ?>" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="update_title" class="form-label">Title</label>
                <input type="text" name="update_title" value="<?php echo $slide_title; ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label for="update_img" class="form-label">Image</label>
                <br>
                <img src="./assets/images/sliders/<?php echo $slide_img; ?>" width="100" height="100" alt="">
                <input type="file" name="update_img" class="form-control">
            </div>

            <div class="mb-3">
                <label for="update_des" class="form-label">Description</label>
                <textarea name="update_des" class="form-control" cols="30" rows="10"><?php echo $slide_des; ?></textarea>
            </div>
            <button type="submit" name="slide_update_req" class="btn btn-outline-warning btn-lg">Update</button>
        </form>

    <?php } ?>

    <?php
        if(isset($_POST['slide_update_req'])){
            $update_title   = $_POST['update_title'];
            $update_des     = $_POST['update_des'];

            $update_img     = $_FILES['update_img']['name'];

            if(empty($update_img)){
                $update_img = $slide_img;
            }else{
                $update_img_tmp = $_FILES['update_img']['tmp_name'];
                move_uploaded_file($update_img_tmp, "assets/images/sliders/$update_img");
            }

            updateSlide($update_title, $update_img, $update_des, $slide_id, $db);
        }
    ?>
    <!-- Slider update end -->

    <!-- User update start -->
    <?php
        if(isset($_GET['update_user'])){
            $get_user_id    = $_GET['update_user'];
            
            $show_query     = "SELECT*FROM users WHERE user_id='$get_user_id'";
            $show_result    = mysqli_query($db, $show_query);
            $show_data      = mysqli_fetch_array($show_result);
            
            $user_id        = $show_data['user_id'];
            $userimg        = $show_data['user_img'];
            $user_full_name = $show_data['user_full_name'];
            $username       = $show_data['username'];
            $useremail      = $show_data['useremail'];
            $userpass       = $show_data['userpass'];
            $usercontact    = $show_data['usercontact'];
            $useraddress    = $show_data['useraddress'];
            $userrole       = $show_data['userrole'];
        }
    ?>

    <?php if(!empty($_GET['update_user'])){ ?>

    <div class="container-fluid">
        <form action="update.php?update_user=<?php echo $user_id; ?>" method="POST" enctype="multipart/form-data" class="mt-3">
            <div class="row">
                <div class="col-4">
                    <div class="mb-3">
                        <label for="user_full_name" class="form-label">Full Name</label>
                        <input type="text" name="user_full_name" value="<?php echo $user_full_name; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username*</label>
                        <input type="text" name="username" value="<?php echo $username; ?>" class="form-control" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="mb-3">
                        <label for="user_email" class="form-label">Email*</label>
                        <input type="email" name="user_email" value="<?php echo $useremail; ?>" class="form-control" required>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_contact" class="form-label">Contact Number</label>
                        <input type="number" name="user_contact" value="<?php echo $usercontact; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_pass" class="form-label">Password*</label>
                        <input type="password" name="user_pass" value="<?php echo $userpass; ?>" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_address" class="form-label">Address</label>
                        <input type="text" name="user_address" value="<?php echo $useraddress; ?>" class="form-control">
                    </div>
                </div>
                <div class="col-6">
                    <div class="mb-3">
                        <label for="user_role" class="form-label">Role</label>
                        <select name="user_role" class="form-control">
                            <option value="<?php echo $userrole; ?>"><?php echo $userrole; ?></option>
                            <option value="visitor">Visitor</option>
                            <option value="editor">Editor</option>
                            <option value="admin">Admin</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6">
                    <img src="assets/images/users/<?php echo $userimg; ?>" alt="">
                    <div class="mb-3">
                        <label for="user_img" class="form-label">Avatar</label>
                        <input type="file" name="user_img" value="<?php echo $userimg; ?>" class="form-control">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <button type="submit" name="user_update_req" class="btn btn-outline-warning">Update</button>
                </div>
            </div>
            
        </form>
    </div>

    <?php } ?>

    <?php
        if(isset($_POST['user_update_req'])){
            $user_full_name   = $_POST['user_full_name'];
            $username         = $_POST['username'];
            $username         = $_POST['user_email'];
            $username         = $_POST['user_contact'];
            $username         = $_POST['user_pass'];
            $username     = $_POST['user_address'];
            $username     = $_POST['user_role'];

            $update_img     = $_FILES['update_img']['name'];

            if(empty($update_img)){
                $update_img = $slide_img;
            }else{
                $update_img_tmp = $_FILES['update_img']['tmp_name'];
                move_uploaded_file($update_img_tmp, "assets/images/users/$update_img");
            }

            updateUser($update_title, $update_img, $update_des, $slide_id, $db);
        }
    ?>
    <!-- User update end -->

    <!-- Category update start -->
    <?php
        if(isset($_GET['update_category'])){
            $get_category_id = $_GET['update_category'];
            
            $show_query     = "SELECT*FROM categorise WHERE category_id='$get_category_id'";
            $show_result    = mysqli_query($db, $show_query);
            $show_data      = mysqli_fetch_array($show_result);
            
            $category_id    = $show_data['category_id'];
            $category_name  = $show_data['category_name'];
        }
    ?>

    <?php if(!empty($_GET['update_category'])){ ?>

        <div class="container-fluid">
            <form action="update.php?update_category=<?php echo $category_id; ?>" method="POST" enctype="multipart/form-data" class="mt-3">
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="category_name" class="form-label">Category Name</label>
                            <input type="text" name="category_name" value="<?php echo $category_name; ?>" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <button type="submit" name="category_update_req" class="btn btn-outline-warning">Update</button>
                    </div>
                </div>
                
            </form>
        </div>

    <?php } ?>

    <?php
        if(isset($_POST['category_update_req'])){
            $category_name   = $_POST['category_name'];

            updateCategory($category_id, $category_name, $db);
        }
    ?>
    <!-- Category update end -->

<?php include('templates/footer.php'); ?>