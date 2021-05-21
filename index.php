<?php include('templates/header.php'); ?>

    <!-- Slider -->
    <section id="homeSlider" class="carousel slide" data-bs-ride="carousel">

        <ol class="carousel-indicators">
        <?php
            // Show Slider indicators
            $show_query = "SELECT*FROM sliders";
            $show_result = mysqli_query($db, $show_query);
            
            if(mysqli_num_rows($show_result) > 0){
                $indicator_index = 0;
                while($silde = mysqli_fetch_assoc($show_result)){
                    echo '<li data-bs-target="#homeSlider" data-bs-slide-to="'.$indicator_index++.'"></li>';
                }
            }else{
                echo '<li data-bs-target="#homeSlider" data-bs-slide-to="0"></li>';
            }
        ?>
        </ol>
        
        <div class="carousel-inner">
        <?php
            // Show Slider Items
            $show_query = "SELECT*FROM sliders";
            $show_result = mysqli_query($db, $show_query);
            
            if(mysqli_num_rows($show_result) > 0){
                while($silde = mysqli_fetch_assoc($show_result)){
                    echo '

                        <div class="carousel-item">
                            <img src="admin/assets/images/sliders/'.$silde['slider_img'].'" class="d-block w-100 img-fluid" alt="">
                            <div class="carousel-caption d-none d-md-block">
                                <h5>'.$silde['slider_title'].'</h5>
                                <p>'.$silde['slider_des'].'</p>
                            </div>
                        </div>

                    ';
                }
            }else{
                echo '

                    <div class="carousel-item">
                        <img src="https://via.placeholder.com/1600x600" class="d-block w-100 img-fluid" alt="">
                        <div class="carousel-caption d-none d-md-block">
                            <h5>First slide label</h5>
                            <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
                        </div>
                    </div>

                ';
            }
        ?>

        </div>
        
        <a class="carousel-control-prev" href="#homeSlider" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </a>

        <a class="carousel-control-next" href="#homeSlider" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </a>
        
    </section>

    <?php
        // User creation from frondend
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
    ?>

<?php include('templates/footer.php'); ?>