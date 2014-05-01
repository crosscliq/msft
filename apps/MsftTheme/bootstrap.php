<?php
class MsftThemeBootstrap extends \Dsc\Bootstrap
{
    protected $dir = __DIR__;
    protected $namespace = 'MsftTheme';


    protected function runSite()
    {   

        $f3 = \Base::instance();
       
        \Dsc\System::instance()->get('theme')->setTheme('MsftTheme', $f3->get('PATH_ROOT') . 'apps/MsftTheme/' );
        \Dsc\System::instance()->get('theme')->registerViewPath( $f3->get('PATH_ROOT')  . 'apps/MsftTheme/Views/', 'MsftTheme/Views' );
        \Dsc\System::instance()->get('theme')->registerViewPath( $f3->get('PATH_ROOT')  . 'apps/Msft/Site/Views/', 'Msft/Site/Views' );

        // add the media assets to be minified        
        $files = array(
            'site/js/jquery/jquery.min.js',
            'site/js/jquery/jquery.widget.min.js',
            'site/js/jquery/jquery.mousewheel.js',
            'site/js/prettify/prettify.js',
            'site/js/load-metro.js',
            'site/js/docs.js'
        );
        
        foreach ($files as $file) 
        {
            \Minify\Factory::js($file);
        }
        
        $files = array(
            'site/css/metro-bootstrap.css',
            'site/css/metro-bootstrap-responsive.css',
            'site/css/docs.css',
            'site/js/prettify/prettify.css',
            'site/css/style.css'
        );

        foreach ($files as $file)
        {
            \Minify\Factory::css($file);
        }
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/");
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/site/");
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/images/");       
        \Minify\Factory::registerPath($f3->get('PATH_ROOT') . "public/site/images/");       
        
   
    }

}
$app = new MsftThemeBootstrap();

