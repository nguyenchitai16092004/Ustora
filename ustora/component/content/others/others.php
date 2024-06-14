<?php
$pages = 'others';
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

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Others</h2>
                </div>
            </div>
        </div>
    </div>
</div>
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