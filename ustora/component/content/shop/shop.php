<?php
error_reporting(E_ALL);
$pages = 'shop';

$servername = "localhost";
$username = "root";
$password = "";
$database = "qlbh";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}
$item_per_page = !empty($_GET['per_page']) ? $_GET['per_page'] : 4;
$current_page = !empty($_GET['page']) ? $_GET['page'] : 1; //Trang hiện tại
$offset = ($current_page - 1) * $item_per_page;
$sql = "SELECT * FROM products where status = 1 ORDER BY prd_id ASC LIMIT " . $item_per_page . " OFFSET " . $offset . "";

$totalRecords = mysqli_query($conn, "SELECT * FROM products");
$totalRecords = $totalRecords->num_rows;
$totalPages = ceil($totalRecords / $item_per_page);

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
                    <h2>Shop</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="search">
    <style>
        #search {
            position: relative;
            left: 29rem;
            top: 5rem;
        }

        .form-control {
            width: 350px;
        }

        .search_option {
            border: none;
            outline: none;
            margin-left: 70px;
            margin-bottom: 45px;
        }

        .btn-success {
            position: relative;
            bottom: 20px;
            left: 30px;
        }

        #myInput {


            font-size: 16px;
            padding: 14px 20px 12px 45px;
            border: none;
            border-bottom: 1px solid #ddd;
        }

        #myInput:focus {
            outline: 3px solid #ddd;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f6f6f6;
            min-width: 360px;
            overflow: auto;
            border: 1px solid #ddd;
            z-index: 100;
        }

        .dropdown-content a {
            color: black;
            padding: 12px 16px;
            text-decoration: none;
            display: block;
        }

        .show {
            display: block;
        }

        .dropdown {
            position: relative;
            bottom: 18rem;
            left: 32rem;
        }

        .page-item {
            border: 1px solid #ccc;
            padding: 5px 9px;
            color: #000;
        }

        .current-page {
            background: #000;
            color: #fff;
        }
    </style>
    </head>

    <body style="background-color:white;">

        <div class="dropdown">
            <button onclick="myFunction()" class="dropbtn"><input type="text" name="txtsearch" class="form-control mr-sm2" placeholder="Search.." id="myInput" onkeyup="filterFunction()"></button>
            <div id="myDropdown" class="dropdown-content">
                <?php foreach ($rows as $latestProduct) : ?>
                    <?php $productLink = "../../../../../ustora/pages/single-product.php?page_layout=single-product&id=" . $latestProduct['prd_id']; ?>
                    <a href="<?php echo $productLink; ?>"><?php echo $latestProduct['prd_name']; ?></a>
                <?php endforeach; ?>
            </div>
        </div>

        <script>
            function myFunction() {
                var input = document.getElementById("myInput");

                if (input.value.trim() !== '') {
                    document.getElementById("myDropdown").classList.toggle("show");
                } else {
                    document.getElementById("myDropdown").classList.remove("show");
                }
            }

            function filterFunction() {
                var input, filter, ul, li, a, i;
                input = document.getElementById("myInput");
                filter = input.value.toUpperCase();
                div = document.getElementById("myDropdown");
                a = div.getElementsByTagName("a");

                if (filter.trim() === '') {
                    div.classList.remove("show");
                    return;
                }

                for (i = 0; i < a.length; i++) {
                    txtValue = a[i].textContent || a[i].innerText;
                    if (txtValue.toUpperCase().indexOf(filter) > -1) {
                        a[i].style.display = "";
                    } else {
                        a[i].style.display = "none";
                    }
                }

                div.classList.add("show");
            }
        </script>





</div>


<div class="single-product-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <?php if (isset($noProductMessage)) : ?>
            <p><?php echo $noProductMessage; ?></p>
        <?php else : ?>
            <div class="row">
                <?php foreach ($rows as $latestProduct) : ?>
                    <?php if ($latestProduct['status'] == 0) continue; ?>
                    <div class="col-md-3 col-sm-6">
                        <div class="single-shop-product">
                            <div class="product-upper">
                                <a href="../../../../../ustora/pages/single-product.php?page_layout=single-product&id=<?php echo $latestProduct['prd_id']; ?>">
                                    <img src=<?php echo $level . IMG_PATH . $latestProduct['image']; ?> alt=""></a>
                            </div>


                            <h2><a href=""><?php echo $latestProduct['prd_name']; ?></a></h2>

                            <div style="color: red; font-weight:bold;" class="product-carousel-price">
                                <?php echo $latestProduct['price'] . 'đ'; ?>
                            </div>
                            <div class="product-option-shop">
                                <a class="add_to_cart_button" data-quantity="1" data-product_sku="" data-product_id="70" rel="nofollow" href="../../../../../ustora/pages/cart.php?page_layout=cart&id=<?php echo $latestProduct['prd_id']; ?>">Add to cart</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="product-pagination text-center">
            <nav>
                <div class="pagination">
                    <?php
                    if ($current_page > 3) {
                        $first_page = 1;
                    ?>
                        <li><a class="current-page page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $first_page ?>">First</a></li>
                    <?php }
                    if ($current_page > 1) {
                        $prev_page = $current_page - 1; ?>
                        <li><a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $prev_page ?>">&laquo;</a></li>
                    <?php } ?>
                    <?php for ($num = 1; $num <= $totalPages; $num++) { ?>
                        <?php if ($num != $current_page) { ?>
                            <?php if ($num > $current_page - 3 && $num < $current_page + 3) { ?>
                                <li><a class="current-page page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $num ?>"><?= $num ?></a></li>
                            <?php } ?>
                        <?php } else { ?>
                            <li><a class="current-page page-item" style="background: #000; color: #fff;"><?= $num ?></a></li>

                        <?php } ?>
                    <?php } ?>
                    <?php
                    if ($current_page < $totalPages - 1) {
                        $next_page = $current_page + 1; ?>
                        <li><a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $next_page ?>">&raquo;</a></li>
                    <?php } ?>

                    <?php
                    if ($current_page < $totalPages - 3) {
                        $end_page = $totalPages;
                    ?>
                        <li><a class="page-item" href="?per_page=<?= $item_per_page ?>&page=<?= $end_page ?>">Last</a></li>
                    <?php } ?>
                </div>
            </nav>
        </div>
    </div>
</div>
</div>
</div>
<script>
    var input = document.querySelector('input');
    var dropdownContent = document.querySelector('.dropdown-content');
    var isTyping = false;

    input.onfocus = () => {
        isTyping = false;
        dropdownContent.classList.remove('show');
    }

    input.oninput = () => {
        isTyping = true;

        if (input.value.trim() === '') {
            dropdownContent.classList.remove('show');
            return;
        }

        $.ajax({
            url: '../../../../ustora/component/content/shop/handle_search.php',
            method: 'POST',
            dataType: 'json',
            data: {
                search_name: input.value
            },
            success: (result) => {
                var suggestions = '';
                $.each(result, (key, item) => {
                    suggestions += `<a href="#" onclick="selectSuggestion('${item.prd_name}', ${item.prd_id})">${item.prd_name}</a>`;
                });
                dropdownContent.innerHTML = suggestions;
                dropdownContent.classList.add('show');
            }

        });
    }

    function selectSuggestion(value, productId) {
        input.value = value;
        dropdownContent.classList.remove('show');
        window.location.href = "../../../../../ustora/pages/single-product.php?page_layout=single-product&id=" + productId;
    }
</script>