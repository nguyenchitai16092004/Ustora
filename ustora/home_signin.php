<?php
session_start();
$level = './';
$page = 'home';
require_once($level . 'configs.php');
require_once($level . COMPONENT_PATH . LAYOUT_PATH . 'layout.php');

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {
    echo '<script>
            setTimeout(function() {
                alert("Bạn đã đăng nhập thành công với User Name: ' . $_SESSION['user_name'] . '");
            }, 1000); 
          </script>';
} else {
    header("Location: pages/signin.php");
}
?>
