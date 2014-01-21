<?php 

$maps = new \Dash\Models\Bingmap;?>

<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h2 class="page-title"><?php echo $event['details']->name;?><small> <?php echo $event['details']->category;?></small></h2>
                                </div>
                              </div>
<section id="stats">                           
<div class="col-md-12">
          <div class="row">
		<div class="col-lg-6">
			<div class="widget-container">
           		  <div class="padded"> <span class="h4"><?php echo $event['details']->address['city']; ?>, <?php echo $event['details']->address['state']; ?></span>
              	    <div class="text-center padder m-t">  <img src="<?php echo $maps->width('300')->height('100')->location('Salt lake City, Utah')->getImageURL(); ?>" >
			  </div>
            		 </div>
            		<div class="widget-footer lt">
              		<div class="row">
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> Start Date</small> <span><?php echo $event['details']->dates['start_date'];?><br/><?php echo $event['details']->dates['start_time'];?></span></div>
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> End Date</small> <span><?php echo $event['details']->dates['end_date'];?><br/><?php echo $event['details']->dates['end_time'];?></span></div>
		  		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-map-marker"></i> Address</small> <span><?php echo $event['details']->address['street']; ?> <?php echo $event['details']->address['zip']; ?> <?php echo $event['details']->address['country']; ?></span></small> </div>
              		</div>
            		</div>
          		</div>
		</div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Wristbands</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <!--i class="fa fa-bar-chart-o"></i-->
                <div class="text-center"><span class="text-top"></span><?php echo $event['details']->wristbands['ordered']; ?></div>
                <small> Activated:</small>

         
                <div id="chart7" style="100px; height:250px;"></div>
                 </div>
              <div class="stats-footer"> &nbsp;</div>
              </a> </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Attendees</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <!--i class="fa fa-bar-chart-o"></i-->
                <div class="text-center"><span class="text-top"></span><?php echo $event['details']->attendees; ?></div>
                <small>Activated:<?php echo $event['attendees']['total']; ?></small> </div>
              <div class="stats-footer"> &nbsp;</div>
              </a> </div>
		
          

          </div>
        </div>
    </div>
</section>
<section id="Activity">
<h1>Activity</h1>
       <pre><?php var_dump($event['wristbands']); ?></pre>
<pre><?php //var_dump($event['attendees']); ?></pre>
</section>

<section id="attendees">
<h1>Attendees</h1>
<pre><?php var_dump($event['attendees']); ?></pre>
</section>
<section id="users"> 
<h1>Users</h1>
<pre><?php var_dump($event['users']); ?></pre>
</section>