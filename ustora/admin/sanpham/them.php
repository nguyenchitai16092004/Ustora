<?php
$sql_brand = "SELECT * FROM brands where brand_status=1";
$query_brand = mysqli_query($connect, $sql_brand);

if (isset($_POST['sbm'])) {
    $prd_name = $_POST['prd_name'];

    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $description = $_POST['description'];
    $brand_id = $_POST['brand_id'];

    $status = $_POST['status'] ?? 1; // Sử dụng toán tử "??", gán mặc định là 1 nếu không có giá trị được gửi

    // Tạo mã sản phẩm ngẫu nhiên dựa trên $brand_id
    $MSP = generateRandomProductCode($brand_id);

    $sql = "INSERT INTO products (prd_name,image,price,quantity,description,brand_id,status,MSP) VALUES('$prd_name', '$image','$price','$quantity','$description','$brand_id','$status','$MSP')";
    $query = mysqli_query($connect, $sql);
    move_uploaded_file($image_tmp, 'img/' . $image);
    header('location: product_management.php?page_layout=danhsach');
}

function generateRandomProductCode($brand_id)
{
    $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $code = '';

    if ($brand_id == '1') {
        $code .= 'NK';
        $codeLength = 4; // Độ dài của phần tiếp theo của mã sản phẩm
    } else {
        $codeLength = 6; // Độ dài của mã sản phẩm nếu thương hiệu không phải "Nokia"
    }

    if ($brand_id == '2') {
        $code .= 'IP';
        $codeLength = 4; // Độ dài của phần tiếp theo của mã sản phẩm
    } else {
        $codeLength = 6; // Độ dài của mã sản phẩm nếu thương hiệu không phải "Iphone"
    }

    if ($brand_id == '3') {
        $code .= 'SS';
        $codeLength = 4; // Độ dài của phần tiếp theo của mã sản phẩm
    } else {
        $codeLength = 6; // Độ dài của mã sản phẩm nếu thương hiệu không phải "Samsung"
    }

    if ($brand_id == '8') {
        $code .= 'XM';
        $codeLength = 4; // Độ dài của phần tiếp theo của mã sản phẩm
    } else {
        $codeLength = 6; // Độ dài của mã sản phẩm nếu thương hiệu không phải "Xiaomi"
    }

    for ($i = 0; $i < $codeLength; $i++) {
        $code .= $characters[rand(0, strlen($characters) - 1)];
    }

    return $code;
}

function getBrandNameFromDatabase($brand_id)
{
}

?>

<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="prd_name" required>
                </div>

                <div class="form-group">
                    <label for="">Ảnh sản phẩm</label></br>
                    <input type="file" name="image">
                </div>

                <div class="form-group">
                    <label for="my-input">Giá sản phẩm</label>
                    <input class="form-control" type="text" name="price" pattern="[0-9]+(\.[0-9]+)*?" title="Chỉ nhập số và kí tự dấu chấm" value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>" required>
                </div>



                <div class="form-group">
                    <label for="my-input">Số lượng sản phẩm</label>
                    <input class="form-control" type="number" name="quantity" required>
                </div>

                <div class="form-group">
                    <label for="my-input">Mô tả sản phẩm</label>
                    <input class="form-control" type="text" name="description" required>
                </div>

                <div class="form-group">
                    <label for="my-select">Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php
                        while ($row_brand = mysqli_fetch_assoc($query_brand)) { ?>
                            <option value="<?php echo $row_brand['brand_id']; ?>"><?php echo $row_brand['brand_name']; ?></option>
                        <?php } ?>
                    </select>
                </div>


                <button name="sbm" class="btn btn-danger" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>