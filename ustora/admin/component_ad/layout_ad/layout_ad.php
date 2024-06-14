<html lang="en">
<head>
    <title><?php echo ucfirst($page)?></title>
    <?php require_once($level.LIB_ADMIN_PATH.'meta.php')?>
    <?php require_once($level.LIB_ADMIN_PATH.'css.php')?>
</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
    <div class="content">

        <?php
        require_once($level.COMPONENT_ADMIN_PATH.HEADER_ADMIN_PATH.'header_ad.php');
        require_once($level.COMPONENT_ADMIN_PATH.CONTENT_ADMIN_PATH.'content_ad.php');
        require_once($level.COMPONENT_ADMIN_PATH.FOOTER_ADMIN_PATH.'footer_ad.php');
        require_once($level.LIB_ADMIN_PATH.'script.php')
        ?>
    </div>
          <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

    </div>
</body>

</html>