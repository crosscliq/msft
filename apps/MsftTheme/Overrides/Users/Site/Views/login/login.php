<?php \Dsc\System::instance()->get( 'session' )->set( 'site.login.redirect', '/roles' ); ?>


   <form action="./login" method="post" class="form" role="form">
           <legend>
                <i class="glyphicon glyphicon-globe"></i>
             Event Staff Log-In</legend>
                                        <div class="input-control text" data-role="input-control">
                                            <input type="text" name="login-username" placeholder="Email">

                                        </div>
                                        <label>&nbsp;</label>
                                        <div class="input-control password" data-role="input-control" style="margin-bottom:20px;">
                                            <input type="password"  name="login-password" placeholder="Password" autofocus="">
                                        </div>                  
                                        <input type="submit" value="Login" class="inverse large">
              
            </form>


            <?php if(class_exists('Hybrid_Auth')) : ?>
            <?php echo $this->renderLayout('Users/Site/Views::login/hybrid.php'); ?>  
            <?php endif; ?>
   