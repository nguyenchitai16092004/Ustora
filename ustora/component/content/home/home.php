<?php
$pages = 'home';

$servername = "localhost";
$username = "root";
$password = "";
$database = "qlbh";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

$sql = "SELECT * FROM products where status = 1";
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
$rows = [];
while ($row = $result->fetch_assoc()) {
    $rows[] = $row;
}

?>




<div class="slider-area">
    <!-- Slider -->
    <div class="block-slider block-slider4">
        <ul class="" id="bxslider-home4">
            <?php
            foreach ($rows as $sliderItem) : ?>
                <?php if ($sliderItem['status'] == 0)  continue; ?>
                <li>
                    <img style="width: 250px; 
                                height:250px;     
                                position: relative;
                                left: 38%;" src="<?php echo $level . IMG_PATH . $sliderItem['image']; ?>" alt="Slide">
                    <div class="caption-group">
                        <h2 style="font-weight:bold;" class="caption title">
                            <?php echo $sliderItem['prd_name']; ?>
                        </h2>
                        <h4 class="caption subtitle">Best Selling</h4>
                        <a class="caption button-radius" href="#"><span class="icon"></span>Shop now</a>
                    </div>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
    <!-- ./Slider -->
</div> <!-- End slider area -->

<div class="promo-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo1">
                    <i class="fa fa-refresh"></i>
                    <p>30 Days return</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo2">
                    <i class="fa fa-truck"></i>
                    <p>Free shipping</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo3">
                    <i class="fa fa-lock"></i>
                    <p>Secure payments</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="single-promo promo4">
                    <i class="fa fa-gift"></i>
                    <p>New products</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End promo area -->


<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <?php foreach ($rows as $latestProduct) : ?>
                        <?php if ($latestProduct['status'] == 0)  continue; ?>
                    <?php endforeach; ?>
                    <h2 class="section-title">Latest Products</h2>
                    <div class="product-carousel">


                        <?php foreach ($rows as $latestProduct) : ?>
                            <?php
                            if ($latestProduct['status'] == 0) continue; ?>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">

                                    <div class="product-hover">
                                        <a href="../../../../../ustora/pages/cart.php?page_layout=cart&id=<?php echo $latestProduct['prd_id']; ?>" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>

                                        <a href="../../../../../ustora/pages/single-product.php?page_layout=single-product&id=<?php echo $latestProduct['prd_id']; ?>" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href="#"> <?php echo $latestProduct['prd_name']; ?>
                                    </a></h2>

                                <div  style="color: red; font-weight:bold;" class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>




                </div>



                <!-- End main content area -->


                <div class="brands-area">
                    <div class="zigzag-bottom"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="brand-wrapper">
                                    <div class="brand-list">
                                        <img src=<?php echo $level . IMG_PATH . "brand1.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand2.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand3.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand4.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand5.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand6.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand1.png" ?> alt="">
                                        <img src=<?php echo $level . IMG_PATH . "brand2.png" ?> alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End brands area -->

                <div class="product-widget-area">
                    <div class="zigzag-bottom"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="single-product-widget">
                                    <h2 class="product-wid-title">Top Sellers</h2>
                                    <a href="" class="wid-view-more">View All</a>

                                    <?php foreach ($rows as $latestProduct) : ?>
                                        <?php
                                        if ($latestProduct['status'] == 0) continue; ?>
                                        <div class="single-wid-product">
                                            <a href="../../../../../ustora/pages/single-product.php?page_layout=single-product&id=<?php echo $latestProduct['prd_id']; ?>"><img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="" class="product-thumb"></a>
                                            <h2><a href="single-product.html"><?php echo $latestProduct['prd_name']; ?></a></h2>
                                            <div class="product-wid-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-wid-price">
                                                <?php echo $latestProduct['price'] . 'đ'; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>





                            <div class="col-md-4">
                                <div class="single-product-widget">
                                    <h2 class="product-wid-title">Recently Viewed</h2>
                                    <a href="#" class="wid-view-more">View All</a>
                                    <?php foreach ($rows as $latestProduct) : ?>
                                        <?php
                                        if ($latestProduct['status'] == 0) continue; ?>

                                        <div class="single-wid-product">
                                            <a href="../../../../../ustora/pages/single-product.php?page_layout=single-product&id=<?php echo $latestProduct['prd_id']; ?>"><img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="" class="product-thumb"></a>
                                            <h2><a href="single-product.html"><?php echo $latestProduct['prd_name']; ?></a></h2>
                                            <div class="product-wid-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-wid-price">
                                                <?php echo $latestProduct['price'] . 'đ'; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="single-product-widget">
                                    <h2 class="product-wid-title">Top New</h2>
                                    <a href="#" class="wid-view-more">View All</a>
                                    <?php foreach ($rows as $latestProduct) : ?>
                                        <?php
                                        if ($latestProduct['status'] == 0) continue; ?>


                                        <div class="single-wid-product">
                                            <a href="../../../../../ustora/pages/single-product.php?page_layout=single-product&id=<?php echo $latestProduct['prd_id']; ?>"><img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="" class="product-thumb"></a>
                                            <h2><a href="single-product.html"><?php echo $latestProduct['prd_name']; ?></a></h2>
                                            <div class="product-wid-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-wid-price">
                                                <?php echo $latestProduct['price'] . 'đ'; ?>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
        $conn->close();
        ?>