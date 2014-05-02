<?php
class DashBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'Dash';

    protected function runSite()
    {
      //  parent::runSite();
        
     //   \Dsc\System::instance()->get('router')->mount( new \Crossbox\Site\Routes, $this->namespace );
    }
    protected function runAdmin()
    {   $f3 = \Base::instance();
        \Dsc\System::instance()->get('router')->mount( new \Dash\Admin\Routes );
          \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/Admin/Views/', 'Dash/Admin/Views' );
          \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Admin\Listener::instance());

          \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Listener::instance());
          \Modules\Factory::registerPositions( array('nav', 'footer', 'above-content', 'below-content') );
          \Modules\Factory::registerPath( $f3->get('PATH_ROOT') . "apps/Dash/Admin/Modules/" );
          \Modules\Factory::registerPositions( array('nav', 'footer', 'above-content', 'below-content') );
          \Modules\Factory::registerPath( $f3->get('PATH_ROOT') . "apps/Dash/Site/Modules/" );
          

        parent::runAdmin();
        
     //   \Dsc\System::instance()->get('router')->mount( new \Crossbox\Site\Routes, $this->namespace );
    }

    protected function runDash()
    {   $f3 = \Base::instance();
        \Dsc\System::instance()->get('theme')->registerViewPath( __dir__ . '/Site/Views/', 'Dash/Site/Views' );

        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Admin\Listener::instance());

        
        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Eventlistener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Pusherlistener::instance());
        \Dsc\System::instance()->getDispatcher()->addListener(\Dash\Admin\Listener::instance());


        \Dsc\System::instance()->get('router')->mount( new \Dash\Site\Routes );
        \Dsc\System::instance()->get('router')->mount( new \Dash\Site\EventRoutes );
       
        $f3->route('GET|POST /logout', function() {
        \Base::instance()->clear('SESSION');
        \Base::instance()->reroute('/');
        });  
    }

}
$app = new DashBootstrap();