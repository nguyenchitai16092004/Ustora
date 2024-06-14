<?php
$sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE products.status = 1";
$query = mysqli_query($connect, $sql);
?>
<style>
    h2 {
        color: blue;
    }

    .search_new {
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="search_new">
                <h2>Danh sách sản phẩm</h2>

                <div id="search">
                    <form class="form-inline" action=" " method="POST">
                        <input type="text" name="txtsearch" placeholder="Search product" class="form-control mr-sm2" value="<?php echo isset($_POST['txtsearch']) ? $_POST['txtsearch'] : ''; ?>">

                        <select name="search_option" class="form-control mr-sm2">
                            <option value="">Lọc</option>
                            <option value="prd_name">Tên sản phẩm</option>
                            <option value="MSP">Mã sản phẩm</option>
                            <option value="brand_name">Thương hiệu</option>
                        </select>

                        <button class="btn btn-success my-2 my-sm-0" type="submit" name="search">Search</button>
                    </form>

                    <?php

                    if (isset($_POST['search'])) {
                        $searchText = $_POST['txtsearch'];
                        $searchOption = $_POST['search_option'];
                        $condition = "";

                        if ($searchOption === "MSP") {
                            $condition = "products.MSP LIKE '%$searchText%'";
                        } else if ($searchOption === "brand_name") {
                            $condition = "brands.brand_name LIKE '%$searchText%'";
                        } else {
                            $condition = "products.prd_name LIKE '%$searchText%'";
                        }

                        $sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE products.status = 1 AND $condition";
                        $query = mysqli_query($connect, $sql);
                    } else {
                        $sql = "SELECT * FROM products INNER JOIN brands ON products.brand_id = brands.brand_id WHERE products.status = 1";
                        $query = mysqli_query($connect, $sql);
                    }
                    ?>

                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th>#</th>
                        <th>Tên sản phẩm</th>
                        <th>Ảnh sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng sản phẩm</th>
                        <th>Mô tả</th>
                        <th>Thương hiệu</th>
                        <th>Trạng thái</th>
                        <th>Mã sản phẩm</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        // Kiểm tra trạng thái, nếu status = 0 thì bỏ qua sản phẩm này
                        if ($row['status'] == 0) {
                            continue;
                        }
                    ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['prd_name']; ?></td>

                            <td>
                                <img style="width: 100px;" src="img/<?php echo $row['image']; ?>">
                            </td>

                            <td><?php echo $row['price']; ?></td>
                            <td><?php echo $row['quantity']; ?></td>
                            <td><?php echo $row['description']; ?></td>
                            <td><?php echo $row['brand_name']; ?></td>
                            <td><?php echo $row['status']; ?></td>
                            <td><?php echo $row['MSP']; ?></td>
                            <td>
                                <a href="index_ds.php?page_layout=sua&id=<?php echo $row['prd_id']; ?>">Sửa</a>
                            </td>
                            <td>
                                <a onclick="return Del('<?php echo $row['prd_name'] ?>')" href="index_ds.php?page_layout=xoa&id=<?php echo $row['prd_id']; ?>">Xóa</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-danger" href="index_ds.php?page_layout=them">Thêm mới</a>
        </div>
    </div>
</div>
<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ? ");
    }
</script>