<?php
    $id=$_GET['id'];

    $sql_brand="SELECT *FROM brands";
    $query_brand = mysqli_query($connect, $sql_brand);

    $sql_up="SELECT * FROM brands where brand_id=$id";
    $query_up=mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if (isset($_POST['sbm'])){
        $brand_name = $_POST['brand_name'];
                
        $brand_quantity = $_POST['brand_quantity'];
    
        $sql = "UPDATE brands SET brand_name = '$brand_name', brand_quantity = $brand_quantity WHERE brand_id = $id";
        
        $query = mysqli_query($connect, $sql);
        header('location: product_table.php?page_layout=danhsachloaisanpham');
    }
    
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa loại sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên loại sản phẩm</label>
                    <input class="form-control" type="text" name="brand_name" required value="<?php echo $row_up['brand_name']; ?>" >
                </div>

                <div class="form-group">
                    <label for="my-input">Số lượng sản phẩm</label>
                    <input class="form-control" type="number" name="brand_quantity" required value="<?php echo $row_up['brand_quantity']; ?>" >
                </div>

                <button name="sbm" class="btn btn-danger" type="submit">Thêm</button>
            </form>
        </div>
    </div>
</div>