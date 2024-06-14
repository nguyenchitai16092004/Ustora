<?php 
    $id = $_GET['id'];

    // Sử dụng truy vấn SQL UPDATE để cập nhật trạng thái thành 0
    $sql = "UPDATE brands SET brand_status = 0 WHERE brand_id = $id";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        // Nếu truy vấn thành công, chuyển hướng đến trang danh sách sản phẩm
        header('location: product_table.php?page_layout=danhsachloaisanpham');
    } else {
        // Xử lý lỗi nếu truy vấn không thành công
        echo "Có lỗi xảy ra khi cập nhật trạng thái sản phẩm.";
    }
?>