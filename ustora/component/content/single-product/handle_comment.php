<?php
session_start();

$connect = mysqli_connect('localhost', 'root', '', 'qlbh');
if ($connect) {
    mysqli_query($connect, "SET NAMES 'UTF8'");
} else {
    echo 'Kết nối thất bại';
}

try {
    // Kiểm tra đăng nhập
    if (!isset($_SESSION['id'])) {
        // Nếu chưa đăng nhập, lưu trang hiện tại vào session và chuyển hướng đến trang đăng nhập
        $_SESSION['return_to'] = $_SERVER['HTTP_REFERER'];
        echo json_encode(["error" => "Bạn cần đăng nhập để bình luận.", "loginRedirect" => true]);
        exit;
    }

    // Lấy dữ liệu từ Ajax
    $rate = $_POST["rate"];
    $content = urldecode($_POST["content"]);
    $id_customer = isset($_POST["id_customer"]) ? (int)$_POST["id_customer"] : 0;
    $productId = isset($_POST["prd_id"]) ? (int)$_POST["prd_id"] : 0;

    // Kiểm tra giá trị hợp lệ
    if ($id_customer <= 0 || $productId <= 0) {
        throw new Exception('Invalid customer or product ID.');
    }

    // Thực hiện câu SQL
    $sql = "INSERT INTO comment (id_customer, prd_id, content, rate, create_date) VALUES ($id_customer, $productId, '$content', $rate, CURRENT_TIMESTAMP())";
    mysqli_query($connect, $sql);

    // Trả về thông báo khi bình luận thành công
    echo json_encode(["message" => "Cảm ơn bạn đã đánh giá sản phẩm!", "reloadPage" => true]);
} catch (Exception $e) {
    echo json_encode(["error" => "Error: " . $e->getMessage()]);
}
?>
