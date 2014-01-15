<?php 

$maps = new \Dash\Models\Bingmap;?>

<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h2 class="page-title"><?php echo $event->name;?><small> <?php echo $event->category;?></small></h2>
                                </div>
                              </div>
<div class="col-md-12">
          <div class="row">
		<div class="col-lg-6">
			<div class="widget-container">
           		  <div class="padded"> <span class="h4"><?php echo $event->address['city']; ?>, <?php echo $event->address['state']; ?></span>
              	    <div class="text-center padder m-t">  <img src="<?php echo $maps->width('300')->height('100')->location('Salt lake City, Utah')->getImageURL(); ?>" >
			  </div>
            		 </div>
            		<div class="widget-footer lt">
              		<div class="row">
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> Start Date</small> <span><?php echo $event->dates['start_date'];?><br/><?php echo $event->dates['start_time'];?></span></div>
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> End Date</small> <span><?php echo $event->dates['end_date'];?><br/><?php echo $event->dates['end_time'];?></span></div>
		  		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-map-marker"></i> Address</small> <span><?php echo $event->address['street']; ?> <?php echo $event->address['zip']; ?> <?php echo $event->address['country']; ?></span></small> </div>
              		</div>
            		</div>
          		</div>
		</div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Wristbands</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <!--i class="fa fa-bar-chart-o"></i-->
                <div class="text-center"><span class="text-top"></span><?php echo $event->wristbands['ordered']; ?></div>
                <small> &nbsp;</small> </div>
              <div class="stats-footer"> &nbsp;</div>
              </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Attendees</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <!--i class="fa fa-bar-chart-o"></i-->
                <div class="text-center"><span class="text-top"></span><?php echo $event->attendees; ?></div>
                <small> &nbsp;</small> </div>
              <div class="stats-footer"> &nbsp;</div>
              </a> </div>
		
          

          </div>
        </div>
    </div>

