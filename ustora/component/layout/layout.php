<html lang="en">
  <head>
    <title><?php echo ucfirst($page)?></title>
    <?php require_once($level.LIB_PATH.'meta.php')?>
    <?php require_once($level.LIB_PATH.'css.php')?>
  </head>
  <body>
    <?php
    require_once($level.COMPONENT_PATH.HEADER_PATH.'header.php');
    require_once($level.COMPONENT_PATH.CONTENT_PATH.'content.php');
    require_once($level.COMPONENT_PATH.FOOTER_PATH.'footer.php');
    require_once($level.LIB_PATH.'script.php');
    ?>
  </body>
</html>