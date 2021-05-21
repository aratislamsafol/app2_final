<?php include('templates/header.php'); ?>
    <section class="categories-content-area py-4 px-2">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">

                    <ul class="nav nav-tabs" id="categoryTab" role="tablist">

                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="categories" data-bs-toggle="tab" href="#category-home" role="tab" aria-controls="category-home" aria-selected="true">All Category</a>
                        </li>

                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="addnew-category" data-bs-toggle="tab" href="#addnewcategory" role="tab" aria-controls="addnewcategory" aria-selected="false">Add New</a>
                        </li>

                    </ul>

                    <div class="tab-content" id="categoryTabContent">

                        <div class="tab-pane fade show active" id="category-home" role="tabpanel" aria-labelledby="categories">

                            <table class="table table-bordered border-success table-sm mt-3">
                                <thead>
                                    <tr>
                                        <th width="5%">ID</th>
                                        <th width="75%">Category</th>
                                        <th width="20%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    
                                        $row_per_page = 10;

                                        $nor_query = "SELECT*FROM categorise";
                                        $nor_result = mysqli_query($db, $nor_query);
                                        $number_of_rows = mysqli_num_rows($nor_result);

                                        $number_of_pages = ceil($number_of_rows / $row_per_page);

                                        if(isset($_GET['page_number'])){
                                            $current_page_number = $_GET['page_number'];
                                        }else{
                                            $current_page_number = 1;
                                        }

                                        $row_offset = ($current_page_number - 1) * $row_per_page;

                                        $show_query = "SELECT*FROM categorise LIMIT {$row_per_page} OFFSET {$row_offset}";
                                        $show_result = mysqli_query($db, $show_query);

                                        if(mysqli_num_rows($show_result) > 0){
                                            while($show = mysqli_fetch_assoc($show_result)){
                                                echo '
                                                    <tr>
                                                        <td width="5%">'.$show['category_id'].'</td>

                                                        <td width="75%">'.$show['category_name'].'</td>

                                                        <td width="20%" class="text-center">
                                                ';       
                                                            
                                                
                                                if($_SESSION['user_role'] == 'admin'){
                                                    echo '
                                                        <a href="" class="btn btn-outline-info btn-sm"><i class="far fa-eye"></i></a>

                                                        &nbsp;

                                                        <a href="update.php?update_category='.$show['category_id'].'" class="btn btn-outline-warning btn-sm"><i class="far fa-edit"></i></a>

                                                        &nbsp;

                                                        <a href="'.$template_path.'.php?delete_category='.$show['category_id'].'" class="btn btn-outline-danger btn-sm"><i class="far fa-trash-alt"></i></a>
                                                    ';
                                                }elseif($_SESSION['user_role'] == 'editor'){
                                                    echo '
                                                        <a href="" class="btn btn-outline-info btn-sm"><i class="far fa-eye"></i></a>

                                                        &nbsp;

                                                        <a href="update.php?update_category='.$show['category_id'].'" class="btn btn-outline-warning btn-sm"><i class="far fa-edit"></i></a>
                                                    ';
                                                }else{
                                                    echo '
                                                        <a href="" class="btn btn-outline-info btn-sm"><i class="far fa-eye"></i></a>
                                                    ';
                                                }
                                                            
                                                echo'        
                                                        </td>
                                                    </tr>
                                                ';
                                            }
                                        }else{
                                            echo '
                                                <tr>
                                                    <td colspan="3" class="text-center text-danger">No data found!!</td>
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
                                            <li class="page-item"><a class="page-link" href="categories.php?page_number=1">First Page</a></li>
                                            <li class="page-item"><a class="page-link" href="categories.php?page_number='.$prev_page.'">Previous</a></li>
                                        ';
                                    }
                                ?>

                                <?php
                                    for($page_number = 1; $page_number <= $number_of_pages; $page_number++){
                                        echo '<li class="page-item"><a class="page-link" href="categories.php?page_number='.$page_number.'">'.$page_number.'</a></li>';
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
                                            <li class="page-item"><a class="page-link" href="categories.php?page_number='.$nxt_page.'">Next</a></li>
                                            <li class="page-item"><a class="page-link" href="categories.php?page_number='.$number_of_pages.'">Last Page</a></li>
                                        ';
                                    }
                                ?>

                                </ul>
                            </nav>
                            
                        </div>

                        <div class="tab-pane fade" id="addnewcategory" role="tabpanel" aria-labelledby="addnew-category">

                            <form action="<?php echo $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data" class="mt-3">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="category_name" class="form-label">Category Name</label>
                                            <input type="text" name="category_name" class="form-control" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" name="create_category" class="btn btn-outline-success btn-lg">Create Category</button>
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

        // Category Insert
        if(isset($_POST['create_category'])){

            $category_name   = $_POST['category_name'];

            insertCategory($category_name, $db);
        }

        // Category Delete
        if(isset($_GET['delete_category'])){
            $category_id = $_GET['delete_category'];

            deleteCategory($db, $category_id);
        }
    ?>
<?php include('templates/footer.php'); ?>