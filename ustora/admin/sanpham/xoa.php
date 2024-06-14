<?php 
    $id = $_GET['id'];

    // Sử dụng truy vấn SQL UPDATE để cập nhật trạng thái thành 0
    $sql = "UPDATE products SET status = 0 WHERE prd_id = $id";
    $query = mysqli_query($connect, $sql);

    if ($query) {
        // Nếu truy vấn thành công, chuyển hướng đến trang danh sách sản phẩm
        header('location: product_management.php?page_layout=danhsach');
    } else {
        // Xử lý lỗi nếu truy vấn không thành công
        echo "Có lỗi xảy ra khi cập nhật trạng thái sản phẩm.";
    }
?>