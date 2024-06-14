<?php
    $id=$_GET['id'];

    $sql_brand="SELECT *FROM brands where brand_status=1";
    $query_brand = mysqli_query($connect, $sql_brand);

    $sql_up="SELECT * FROM products where prd_id=$id ";
    $query_up=mysqli_query($connect, $sql_up);
    $row_up = mysqli_fetch_assoc($query_up);

    if (isset($_POST['sbm'])){
        $prd_name = $_POST['prd_name'];
        
        if($_FILES['image']['name'] == ''){
            $image = $row_up['image'];
        } else {
            $image = $_FILES['image']['name'];
            $image_tmp = $_FILES['image']['tmp_name'];
            move_uploaded_file($image_tmp, 'img/'.$image);
        }
        
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $description = $_POST['description'];
        $brand_id = $_POST['brand_id'];
        $MSP=$_POST['MSP'];
    
        // Thêm điều kiện WHERE để chỉ cập nhật sản phẩm có ID phù hợp
        $sql = "UPDATE products SET prd_name = '$prd_name', image = '$image', price = '$price', quantity = $quantity, 
        description = '$description', brand_id = $brand_id, MSP='$MSP' WHERE prd_id = $id ";

        
        $query = mysqli_query($connect, $sql);
        header('location: product_management.php?page_layout=danhsach');
    }
    
?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Sửa sản phẩm</h2>
        </div>
        <div class="card-body">
            <form method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên sản phẩm</label>
                    <input class="form-control" type="text" name="prd_name" required value="<?php echo $row_up['prd_name']; ?>">
                </div>

                <div class="form-group">
                  <label for="">Ảnh sản phẩm</label></br>
                  <input type="file" name="image" >
                </div>

                <div class="form-group">
                    <label for="my-input">Giá sản phẩm</label>
                    <input class="form-control" type="text" name="price" pattern="[0-9]+(\.[0-9]+)*?" title="Chỉ nhập số và kí tự dấu chấm" value="<?php echo isset($_POST['price']) ? htmlspecialchars($_POST['price']) : ''; ?>" required>
                </div>

                <div class="form-group">
                    <label for="my-input">Số lượng sản phẩm</label>
                    <input class="form-control" type="number" name="quantity" required value="<?php echo $row_up['quantity']; ?>">
                </div>

                <div class="form-group">
                    <label for="my-input">Mô tả sản phẩm</label>
                    <input class="form-control" type="text" name="description" required value="<?php echo $row_up['description']; ?>">
                </div>

                <div class="form-group">
                    <label for="my-select">Thương hiệu</label>
                    <select class="form-control" name="brand_id">
                        <?php
                            while($row_brand=mysqli_fetch_assoc($query_brand)){?>
                                <option value="<?php echo $row_brand['brand_id'];?>"><?php echo $row_brand['brand_name'];?></option>
                        <?php }?>
                    </select>
                </div>

                <!-- Thêm trường nhập ẩn để lưu giữ giá trị hiện tại của MSP -->
                <input type="hidden" name="existing_MSP" value="<?php echo $row_up['MSP']; ?>">

                <div class="form-group">
                    <label for="my-input">Mã sản phẩm</label>
                    <input class="form-control" type="text" name="MSP" required value="<?php echo isset($_POST['MSP']) ? htmlspecialchars($_POST['MSP']) : $row_up['MSP']; ?>">
</div>


                <button name="sbm" class="btn btn-danger" type="submit">Sửa</button>
            </form>
        </div>
    </div>
</div>