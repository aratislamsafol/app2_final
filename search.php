<?php include('templates/header.php'); ?>

    <section class="search-page my-3">
        <div class="container">
            <?php
                if(isset($_POST['search_req'])){
                    $search_key = $_POST['search_key'];

                    $search_query = "SELECT*FROM sliders WHERE slider_title LIKE '%$search_key%'";
                    $search_result = mysqli_query($db, $search_query);

                    if(mysqli_num_rows($search_result) > 0){
                        echo '<div class="row"><h3>Search Result for: <strong>'.$search_key.'</strong></h3><hr>';
                        while($search_data = mysqli_fetch_assoc($search_result)){
                            echo '
                                <div class="col-3">
                                    <h3>'.$search_data['slider_title'].'</h3>
                                </div>
                            ';
                        }
                        echo '</div>';
                    }else{
                        
                        echo '<div class="row"><div class="col-12"><h3>No data found with this key: <strong>'.$search_key.'</strong></h3></div></div>';
                    }
                }
            ?>
            </div>
        </div>
        
    </section>

<?php include('templates/footer.php'); ?>