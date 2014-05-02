<?php \Dsc\System::instance()->get( 'session' )->set( 'site.login.redirect', '/roles' ); ?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            
            <?php echo $this->renderLayout('Users/Site/Views::login/login.php'); ?>    
            <?php // if(class_exists('Hybrid_Auth')) : ?>
            <?php // echo $this->renderLayout('Users/Site/Views::login/hybrid.php'); ?>  
            <?php // endif; ?>
        </div>
    </div>
</div>


