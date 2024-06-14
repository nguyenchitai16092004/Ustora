<?php
    require_once 'db/db.php';
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
                case 'single_product':
                    require_once 'component/content/single-product/single-product.php';
                    break;
                case'cart':
                    require_once 'component/content/cart/cart.php';
                    break;
                

                // Uncomment and modify as needed
                // case 'them':
                //     require_once 'sanpham/them.php';
                //     break;

                // case 'sua':
                //     require_once 'sanpham/sua.php';
                //     break;

                // case 'xoa':
                //     require_once 'sanpham/xoa.php';
                //     break;

                default:
                    // Redirect to a default page or display a default content
                    header("Location: index.php");
                    exit();
                    break;
            }
        } else {
            // Redirect to a default page or display a default content
            header("Location: index.php");
            exit();
        }
    ?>
</body>
</html>
