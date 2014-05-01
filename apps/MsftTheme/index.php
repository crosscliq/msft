<!DOCTYPE html>
<html lang="en" class="default <?php echo @$html_class; ?>" >
<head>
<?php echo $this->renderView('MsftTheme/Views::common/head.php'); ?>  
</head>
<body>
    <!-- PAGE -->
    <body class="metro">
    <?php echo $this->renderView('Msft/Site/Views::header/header.php'); ?>  
        <?php // <tmpl type="system.messages" /> ?>
         <tmpl type="view" />
        <!--/FOOTER -->
    </div>
    <!--/PAGE -->
<?php echo $this->renderView('MsftTheme/Views::common/footer.php'); ?>
</body>
</html>
