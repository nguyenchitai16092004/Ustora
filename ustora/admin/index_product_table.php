<?php
    require_once 'connect_sql/db.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  
    <title>USTORA ADMIN</title>
    <style>
        body{
            background-color:black ;
        }
    </style>
</head>
<body>
    <?php
        if(isset($_GET['page_layout'])){
            switch($_GET['page_layout']){
                case 'danhsach':
                    require_once 'sanpham/danhsachloaisanpham.php';
                    break;

                case 'them':
                    require_once 'sanpham/them_lsp.php';
                    break;

                case 'sua':
                    require_once 'sanpham/sua_lsp.php';
                    break;

                case 'xoa':
                    require_once 'sanpham/xoa_lsp.php';
                    break;

                default:
                require_once 'sanpham/danhsachloaisanpham.php';
                break;
            }
        }else{
            require_once 'sanpham/danhsachloaisanpham.php';
        }
    ?>
</body>
</html>