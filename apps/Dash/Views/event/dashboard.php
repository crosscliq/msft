<?php 

$maps = new \Dash\Models\Bingmap;?>

<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h2 class="page-title">Event Name <small> ID#</small></h2>
                                </div>
                              </div>
              <div class="row">
<img src="<?php echo $maps->width('200')->height('100')->location('Salt lake City, Utah')->getImageURL(); ?>">
             </div>
    </div>
