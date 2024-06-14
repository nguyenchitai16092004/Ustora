<?php
$pages = 'single-product';
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'qlbh';

$connect = mysqli_connect($host, $username, $password, $database);

if (!$connect) {
    die("Kết nối không thành công: " . mysqli_connect_error());
}

$productId = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if ($productId <= 0) {
    header('Location: /error.php');
    exit;
}

$id_customer = isset($_SESSION['id']) ? $_SESSION['id'] : 0; // Thêm dòng này

$sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE products.status = 1 AND products.prd_id = $productId";
$query = mysqli_query($connect, $sql);

if (!$query) {
    die("Truy vấn không thành công: " . mysqli_error($connect));
}
    
$rows = mysqli_fetch_all($query, MYSQLI_ASSOC);

$sqlComments = "SELECT comment.*, account.user_name FROM comment JOIN account ON comment.id_customer = account.id WHERE comment.prd_id = $productId";
$queryComments = mysqli_query($connect, $sqlComments);

if (!$queryComments) {
    die("Truy vấn không thành công: " . mysqli_error($connect));
}

$comments = mysqli_fetch_all($queryComments, MYSQLI_ASSOC);
?>



<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Single Product</h2>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">

            <div class="col-md-8">
                <div class="product-content-right">
                    <div class="product-breadcroumb">
                        <a href="../../../../../ustora/index.php">Home</a>
                        <a href="#">Category Name</a>




                        <?php
                        foreach ($rows as $latestProduct) : ?>
                            <?php if ($latestProduct['status'] == 0)  continue; ?>
                            <a href=""><?php echo $latestProduct['prd_name']; ?> </a>
                        <?php endforeach; ?>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="product-images">
                                <?php foreach ($rows as $latestProduct) : ?>
                                    <?php if ($latestProduct['status'] == 0) continue; ?>
                                    <div class="product-main-img">

                                        <img src="<?php echo $level . IMG_PATH . $latestProduct['image']; ?>" alt="Slide">

                                    </div>

                                <?php endforeach; ?>

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="product-inner">
                                <?php foreach ($rows as $latestProduct) : ?>
                                    <h2 class="product-name"><?php echo $latestProduct['prd_name']; ?></h2>
                                    <div style="color: red; font-weight:bold;" class="product-inner-price">
                                        <?php echo $latestProduct['price'] . 'đ'; ?>
                                    </div>

                                    <form action="" class="cart">
                                        <div class="quantity">
                                            <input type="number" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                        </div>
                                        <a href="../../../../../ustora/pages/cart.php?page_layout=cart&id=<?php echo $latestProduct['prd_id']; ?>" class="add_to_cart_button" type="submit">Add to cart</a>
                                    </form>

                                    <div class="product-inner-category">
                                        <p>Category: <a href="">Summer</a>. Tags: <a href="">awesome</a>, <a href="">best</a>, <a href="">sale</a>, <a href="">shoes</a>. </p>
                                    </div>

                                    <div role="tabpanel">
                                        <ul class="product-tab" role="tablist">
                                            <li role="presentation" class="active"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Reviews</a></li>

                                        </ul>
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="home">
                                                <h2>Product Description</h2>
                                                <p><?php echo $latestProduct['description']; ?></p>

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="profile">
                                                <h2>Reviews</h2>
                                                <ul>
                                                    <style>
                                                        ul {
                                                            list-style: none;
                                                            display: flex
                                                        }

                                                        li:hover {
                                                            opacity: 0.6;
                                                            transition: 0.3s;
                                                        }

                                                        li {
                                                            transition: 0.3s;
                                                            color: orange;
                                                        }

                                                        .fa {
                                                            font-weight: initial;
                                                        }

                                                        .rating-chooser {
                                                            display: none;
                                                        }
                                                        
                                                        .btn_sent{
                                                            background-color: #5a88ca;	
                                                            border: none; 
                                                            width:60px;
                                                            height:40px;
                                                        }
                                                        .btn_sent:hover{
                                                            background-color: #93b6e8 ;
                                                        }
                                                    </style>
                                                    <li><i class="fa fa-star ratting-btn"></i></li>
                                                    <li><i class="fa fa-star ratting-btn"></i></li>
                                                    <li><i class="fa fa-star ratting-btn"></i></li>
                                                    <li><i class="fa fa-star ratting-btn"></i></li>
                                                    <li><i class="fa fa-star ratting-btn"></i></li>
                                                </ul>
                                                <div style="display: flex;flex-direction:column;">
                                                    <div class="submit-review">
                                                        <div class="rating-chooser">
                                                            <p>Your rating</p>

                                                            <input type="checkbox" class="ratting-input">
                                                            <input type="checkbox" class="ratting-input">
                                                            <input type="checkbox" class="ratting-input">
                                                            <input type="checkbox" class="ratting-input">
                                                            <input type="checkbox" class="ratting-input">

                                                        </div>
                                                        <input type="text" class="comment-content" name="comment_content"required >
                                                        <button class="btn_sent">Sent</button>
                                                    </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div id="user_comment">
                    <p style="margin-bottom: 10px; font-size:20px; ">Based on <span style="font-weight: bold;color:#5a88ca"><?php echo count($comments); ?></span> Comments</p>
                        <?php foreach ($comments as $comment) : ?>
                        <div style="display: flex;background-color: #ece6e0; width:70.5rem; height:9rem; ">
                            <div style="justify-content: space-between; margin-top:25px;">
                                <img style="border-radius: 50%; width:70px; height:70px; margin: 10px 20px;" src="../../../../ustora/img/images.jpg" alt="">
                            </div>
                            <div style="margin-top: 20px;">
                            <h3 style="font-weight: bold;"><?php echo $comment['user_name']; ?></h3>
                                <div style="display: flex;">
                                    <div style="justify-content: space-between;" class="rating-wrap-post">
                                    <?php
                                        for ($i = 1; $i <= 5; $i++) {
                                            $starClass = ($i <= $comment['rate']) ? 'fas' : 'far';
                                            echo '<i class="' . $starClass . ' fa-star" style="color: orange;"></i>';
                                        }
                                        ?>

                                    
                                    </div>
                                    <div>
                                        <h3>(<?php echo $comment['rate']; ?>)</h3>
                                    </div>
                                </div>
                                <div>
                                    <p><?php echo $comment['content']; ?></p>
                                </div>
                                <div>
                                    <p><?php echo $comment['create_date']; ?></p>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="related-products-wrapper">
                        <h2 class="related-products-title">Related Products</h2>
                        <div class="related-products-carousel">
                            <div class="single-product">
                                <div class="product-f-image">
                                    <?php
                                    foreach ($rows as $latestProduct) : ?>
                                        <?php if ($latestProduct['status'] == 0)  continue; ?>
                                        <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                        <div class="product-hover">
                                            <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                            <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                        </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                                <div style="color: red; font-weight:bold;" class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>
                                <div style="color: red; font-weight:bold;" class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                                <div style="color: red; font-weight:bold;" class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                                <div class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                                <div class="product-carousel-price">
                                    <?php echo $latestProduct['price'] . 'đ'; ?>
                                </div>
                            </div>
                            <div class="single-product">
                                <div class="product-f-image">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt="">
                                    <div class="product-hover">
                                        <a href="" class="add-to-cart-link"><i class="fa fa-shopping-cart"></i> Add to cart</a>
                                        <a href="" class="view-details-link"><i class="fa fa-link"></i> See details</a>
                                    </div>
                                </div>

                                <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                                <div class="product-carousel-price">
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
<script>
    var rattingBtn = document.querySelectorAll('.ratting-btn');
    var rattingInput = document.querySelectorAll('.ratting-input');
    var commentContent = document.querySelector('.comment-content');
    var submitBtn = document.querySelectorAll('button');
    var rate = 0;

    rattingBtn.forEach((item, key) => {
        item.onclick = () => {
            for (let i = 0; i < 5; i++) {
                rattingBtn[i].classList.remove('fa');
                rattingInput[i].checked = false;
            }
            for (let i = 0; i < 5; i++) {
                if (i <= key) {
                    rattingBtn[i].classList.add('fas');
                    rattingInput[i].checked = true;
                } else {
                    rattingBtn[i].classList.add('fa');
                    rattingInput[i].checked = false;
                }
            }
            rate = key + 1;
        }
    });

    submitBtn.forEach(btn => {
        btn.addEventListener('click', () => {
            <?php if (!isset($_SESSION['id'])) : ?>
                if (confirm('Bạn cần đăng nhập để bình luận. Bạn có muốn chuyển đến trang đăng nhập không?')) {
                    window.location.href = '../../../../ustora/pages/signin.php';
                }
            <?php else : ?>
                $.ajax({
                    url: '../../../../ustora/component/content/single-product/handle_comment.php',
                    method: 'post',
                    dataType: 'json',
                    data: {
                        rate: rate,
                        content: encodeURIComponent(commentContent.value),
                        id_customer: <?php echo $id_customer; ?>,
                        prd_id: <?php echo $productId; ?>,
                    },
                    success: (result) => {
                        if (result.error) {
                            alert(result.error);
                        } else {
                            alert(result.message);
                            if (result.reloadPage) {
                                location.reload();
                            }
                        }
                    },
                });
            <?php endif; ?>
        });
    });
</script>
