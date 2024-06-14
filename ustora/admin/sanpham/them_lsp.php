<?php
    $sql_brand="SELECT *FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    if(isset($_POST['sbm'])){
        $brand_name=$_POST['brand_name'];
        $brand_quantity=$_POST['brand_quantity'];

        if (isset($_POST['brand_status'])) {
            $brand_status = $_POST['brand_status'];
        } else {
            $brand_status = 1; // Gán mặc định bằng 1 nếu không có giá trị được gửi
        }

        $sql="INSERT INTO brands (brand_name,brand_quantity,brand_status) VALUES('$brand_name','$brand_quantity','$brand_status')";
        $query=mysqli_query($connect,$sql);
        header('location: product_table.php?page_layout=danhsachloaisanpham');
    }
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Thêm loại sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="brand_name" required>
                </div>

                <div class="form-group">
                    <label for="my-input">Số lượng sản phẩm</label>
                    <input class="form-control" type="number" name="brand_quantity" required>
                </div>

                <button name="sbm" class="btn btn-danger" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>