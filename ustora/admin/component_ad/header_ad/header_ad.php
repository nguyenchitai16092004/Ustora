      <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href=<?php echo $level."index.php"?> class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
                    <a style="margin-left: 30px;" href="../../../../ustora/index.php" class="text-primary"><i style="font-size: 30px" class="fa fa-solid fa-arrow-left"></i></a>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">Jhon Doe</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href=<?php 
                    if($page!='home'){
                        echo $level."index.php";
                    }else{
                        echo '#';
                    }
                    
                    ?> class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Elements</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=<?php echo $level."button.php"?> class="dropdown-item">Buttons</a>
                            <a href=<?php echo $level."typography.php"?> class="dropdown-item">Typography</a>
                            <a href=<?php echo $level."product_management.php"?> class="dropdown-item">Product Management</a>
                        </div>
                    </div>
                    <a href=<?php echo $level."product_table.php"?> class="nav-item nav-link"><i class="fa fa-th me-2"></i>Product Table</a>
                    <a href=<?php echo $level."form.php"?> class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Forms</a>
                    <a href=<?php echo $level."table.php"?> class="nav-item nav-link"><i class="fa fa-table me-2"></i>Tables</a>
                    <a href=<?php echo $level."chart.php"?> class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href=<?php echo $level."signin.php"?> class="dropdown-item">Sign In</a>
                            <a href=<?php echo $level."signup.php"?> class="dropdown-item">Sign Up</a>
                            <a href=<?php echo $level."404.php"?> class="dropdown-item">404 Error</a>
                            <a href=<?php echo $level."blank.php"?> class="dropdown-item">Blank Page</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

