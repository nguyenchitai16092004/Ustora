<?php
ob_start();
?>
<div class="header-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="user-menu">
                    <li>
                        <?php if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) : ?>
                            <li><a class="signin_1" href="#"><i class="fa fa-user"></i>Hello, <?php echo $_SESSION['name']; ?></a></li>
                            <li><a class="signin_2" href="<?php echo $level . 'pages/logout.php'; ?>"><i class="fa-solid fa-right-from-bracket"></i></a></li>
                            <li><a href="#"><i class="fa fa-heart"></i> Wishlist</a></li>
                            <li><a href=<?php echo $level . PAGES_PATH . 'checkout.php' ?>><i class="fa fa-user"></i> Checkout</a></li>
                        <?php else : ?>
                            <li><a href="<?php echo $level . PAGES_PATH . 'signin.php'; ?>"><i class="fa fa-user"></i> Signin</a></li>
                            <li><a href="<?php echo $level . PAGES_PATH . 'signup.php'; ?>"><i class="fa fa-user"></i> Signup</a></li>
                        <?php endif; ?>

                    </li>
                </div>
            </div>

            <div class="col-md-4">
                <div class="header-right">
                    <ul class="list-unstyled list-inline">
                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">currency :</span><span class="value">USD </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">USD</a></li>
                                <li><a href="#">INR</a></li>
                                <li><a href="#">GBP</a></li>
                            </ul>
                        </li>

                        <li class="dropdown dropdown-small">
                            <a data-toggle="dropdown" data-hover="dropdown" class="dropdown-toggle" href="#"><span class="key">language :</span><span class="value">English </span><b class="caret"></b></a>
                            <ul class="dropdown-menu">
                                <li><a href="#">English</a></li>
                                <li><a href="#">French</a></li>
                                <li><a href="#">German</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End header area -->
<div class="site-branding-area">
    <div class="container">
        <div style="display: flex;" class="row">
            <div class="col-sm-6">
                <div class="logo">
                    <h1><a href="#"><img style="margin-right:500px;
                            margin-bottom:21px;" src=<?php echo $level . IMG_PATH . "logo.png" ?>></a></h1>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="shopping-item">
                    <a href="../../../ustora/pages/cart.php">Cart - <span class="cart-amunt">$100</span> <i class="fa-solid fa-cart-shopping"></i>  <span class="product-count">5</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div style="height: 60px;" class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="active"><a href=<?php
                                                if ($page != 'home') {
                                                    echo $level . 'index.php';
                                                } else {
                                                    echo '#';
                                                } ?>>Home</a></li>
                    <li><a href=<?php echo $level . PAGES_PATH . 'shop.php' ?>>Shop page</a></li>
                    <li><a href=<?php echo $level . PAGES_PATH . 'checkout.php' ?>>Checkout</a></li>
                    <li><a href="#">Category</a></li>
                    <li><a href=<?php echo $level . PAGES_PATH . 'others.php' ?>>Others</a></li>
                    <li><a href=<?php echo $level . PAGES_PATH . 'contact.php' ?>>Contact</a></li>

                </ul>
            </div>
        </div>
    </div>
</div>
<?php
ob_end_flush();
?>