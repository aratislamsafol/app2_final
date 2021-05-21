    <?php include('templates/modals.php'); ?>
    <script src="./assets/js/jquery.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    <script src="./assets/js/main.js"></script>
   
   
    <?php if($template_path == 'index'){ ?>

        <script>
            $(document).ready(function(){
                $('#dashNav .nav-item:nth-child(1) .nav-link').addClass('active');
            });
        </script>

    <?php }elseif($template_path == 'slider'){ ?>

        <script>
            $(document).ready(function(){
                $('#dashNav .nav-item:nth-child(2) .nav-link').addClass('active');
            });
        </script>

    <?php }elseif($template_path == 'users'){ ?>

        <script>
            $(document).ready(function(){
                $('#dashNav .nav-item:nth-child(3) .nav-link').addClass('active');
            });
        </script>

    <?php }elseif($template_path == 'portfolios'){ ?>

        <script>
            $(document).ready(function(){
                $('#dashNav .nav-item:nth-child(4) .nav-link').addClass('active');
            });
        </script>

    <?php }else{ ?>

        <script>
            $(document).ready(function(){
                $('#dashNav .nav-item:nth-child(5) .nav-link').addClass('active');
            });
        </script>
        
    <?php } ?>

    </body>
</html>