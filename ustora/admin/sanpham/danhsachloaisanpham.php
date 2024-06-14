<?php
    $sql = "SELECT * FROM brands";
    $query = mysqli_query($connect, $sql);

?>

<style>
    h2{
        color: blue;
    }
    .search_new{
        display: flex;
        justify-content: space-between;
    }
</style>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <div class="search_new">
                <h2>Danh sách loại sản phẩm</h2>

                <div id="search">
                    <form class="form-inline" action=" " method="POST">
                    <input type="text" name="txtsearch" placeholder="Search brands" class="form-control mr-sm2" value="<?php echo isset($_POST['txtsearch']) ? $_POST['txtsearch'] : ''; ?>">

                    <button class="btn btn-success my-2 my-sm-0" type="submit" name="search">Search brands</button>
                    </form>
                    <?php

                        if (isset($_POST['search'])) {
                            $searchText = $_POST['txtsearch'];
                            $sql = "SELECT * FROM brands WHERE brand_name LIKE '%$searchText%'";
                            $query = mysqli_query($connect, $sql);
                        } else {
                            $sql = "SELECT * FROM brands";
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
                        <th>Tên loại sản phẩm</th>
                        <th>Số lượng loại sản phẩm</th>
                        <th>Trạng thái</th>
                        <th>Sửa</th>
                        <th>Xóa</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) {
                        if ($row['brand_status'] == 0) {
                            continue;
                        }
                        ?>
                        <tr>
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['brand_name']; ?></td>
                            <td><?php echo $row['brand_quantity']; ?></td>
                            <td><?php echo $row['brand_status']; ?></td>

                            <td>
                                <a href="index_product_table.php?page_layout=sua&id=<?php echo $row['brand_id']; ?>">Sửa</a>
                            </td>

                            <td>
                                <a onclick="return Del('<?php echo $row['brand_name'] ?>')"  href="index_product_table.php?page_layout=xoa&id=<?php echo $row['brand_id']; ?>">Xóa</a>
                            </td>
                            
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <a class="btn btn-danger" href="index_product_table.php?page_layout=them">Thêm mới</a>
        </div>
    </div>
</div>
<script>
    function Del(name) {
        return confirm("Bạn có chắc chắn muốn xóa sản phẩm: " + name + " ? ");
    }
</script>
