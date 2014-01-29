<?php 

$maps = new \Dash\Models\Bingmap;?>

<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
				      <a href="#" class="btn btn-s btn-success pull-right"><i class="icon-edit"></i> Edit</a>
                                  <h1 class="page-title"><?php echo $event['details']->name;?><small> <?php echo $event['details']->category;?></small></h1>
                                </div>
                              </div>
<section id="stats">                           
<div class="col-md-12">
          <div class="row">
		<div class="col-lg-6">
			<div class="widget-container">
            		<div class="widget-footer lt">
              		<div class="row">
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> Start Date</small> <span><?php echo $event['details']->dates['start_date'];?><br/><?php echo $event['details']->dates['start_time'];?></span></div>
                		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-calendar"></i> End Date</small> <span><?php echo $event['details']->dates['end_date'];?><br/><?php echo $event['details']->dates['end_time'];?></span></div>
		  		  <div class="col-xs-4"> <small class="text-muted block"><i class="icon-map-marker"></i> Address</small> <span><?php echo $event['details']->address['street']; ?> <?php echo $event['details']->address['zip']; ?> <?php echo $event['details']->address['country']; ?></span></small> </div>
              		</div>
            		</div>
           		  <div class="">
			   <div class="text-center padder m-t">  <img style="width:100%;opacity:0.6;" src="<?php echo $maps->width('400')->height('345')->location($event['details']['address']['city'] . ', ' . $event['details']['address']['state'])->getImageURL(); ?>" >
			  </div>
            		 </div>

          		</div>
		</div> 
		<div class="col-md-3 col-xs-12 col-sm-6">
              <div class="stats-heading">Wristbands</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <div class="text-center"><h1><span class="wbAvailable"><?php echo $event['wristbands']['available']; ?></span><small> / <span  class="wbTotal"><?php echo $event['wristbands']['total']; ?></span> </small></h1></div>
		  <small>Available / Total</small> 
              </div>
              <div class="stats-footer">&nbsp;</div>
              </div>
            <div class="col-md-3 col-xs-12 col-sm-6"> <a href="#" class="stats-container">
              <div class="stats-heading">Attendees</div>
              <div class="stats-body-alt" style="height:170px;"> 
                <!--i class="fa fa-bar-chart-o"></i-->
                <div class="text-center"><h1><span class="aAvailable"><?php echo ( $event['details']['attendees'] - $event['attendees']['total'] ) ?></span><small> / <span class="aTotal"><?php echo $event['details']['attendees']; ?></span> </small></h1></div>
                <small>Available / Total </div>
              <div class="stats-footer"> &nbsp;</div>
              </a> </div>
		
          
		<div class="col-lg-6">
          		<div class="widget">
            			<div class="widget-header"> <i class="icon-bar-chart"></i>
              			<h3>Wristbands / Attendees </h3>
            			</div>
            			<!-- /widget-header -->
            		<div class="widget-content">
              		<div class="shortcuts"> 
					<div class="shortcut"><h2 class="wbTotal"><?php echo $event['wristbands']['total']; ?></h2><span class="shortcut-label">Total</span> </div>
					<div class="shortcut"><h2 class="tTotal"><?php echo $event['tickets']['total']; ?></h2><span class="shortcut-label">Ticketed</span> </div>
					<div class="shortcut"><h2 class="aTotal"><?php echo $event['attendees']['total']; ?></h2><span class="shortcut-label">Registered</span> </div>
					<div class="shortcut"><h2 class="eTotal"><?php echo $event['wristbands']['withNOAttendeesAndTickets']; ?></h2><span class="shortcut-label">Empty</span> </div>

					<div class="shortcut"><div class="chart shortcut-icon" data-percent="<?php echo ceil(( $event['wristbands']['available'] / $event['wristbands']['total'] * 100 )); ?>"><span class="chart-txt"><?php echo ceil(( $event['wristbands']['available'] / $event['wristbands']['total'] * 100 )); ?></span></div><span class="shortcut-label">% Available</span> </div>
					<div class="shortcut"><div class="chart shortcut-icon" data-percent="<?php echo ceil(( $event['tickets']['total'] / $event['wristbands']['total'] * 100 )); ?>"><span class="chart-txt"><?php echo ceil(( $event['tickets']['total'] / $event['wristbands']['total'] * 100 )); ?></span></div><span class="shortcut-label">% Ticketed</span> </div>
					<div class="shortcut"><div class="chart shortcut-icon" data-percent="<?php echo ceil(( $event['attendees']['total'] / $event['details']['attendees'] * 100 )); ?>"><span class="chart-txt"><?php echo ceil(( $event['attendees']['total'] / $event['details']['attendees'] * 100 )); ?></span></div><span class="shortcut-label">% Registered</span> </div>
					<div class="shortcut"><div class="chart shortcut-icon" data-percent="<?php echo ceil(( $event['wristbands']['withNOAttendeesAndTickets'] / $event['wristbands']['total'] * 100 )); ?>"><span class="chart-txt"><?php echo ceil(( $event['wristbands']['withNOAttendeesAndTickets'] / $event['wristbands']['total'] * 100 )); ?></span></div><span class="shortcut-label">% Empty</span> </div>

				</div>
              		<!-- /shortcuts --> 
           		 </div>
            		<!-- /widget-content --> 
          		</div>
        	</div>


          </div>
        </div>
    </div>
</section>
<section id="Activity">

<div class="col-lg-12">
          <div class="widget">
            <div class="widget-header"> <i class="icon-time"></i>
              <h3>Activity</h3>
            </div>
            <div class="widget-content">
<ul class="nav nav-tabs nav-tabs-small" id="activityTabs">
                              <li class="active">
                                    <a data-toggle="tab" href="#activity-All">All Activity</a>
                              </li>
                              <li class="">
                                    <a data-toggle="tab" href="#activity-Tickets">Tickets</a>
                              </li>
                              <li>
                                    <a data-toggle="tab" href="#activity-Reg">Registration</a>
                              </li>
                              <li>
                                    <a data-toggle="tab" href="#activity-Prizes">Prizes</a>
                              </li>
                              <li>
                                    <a data-toggle="tab" href="#activity-Users">Users</a>
                              </li>
                        </ul>
<legend class="section"></legend>
<div class="tab-content">
	<div class="tab-pane active" id="activity-All">
              <div class="timeline-messages" id="activity-log"> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-user message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th Jan 2014</p>
                      <p>Logged-In</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-trophy message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 14th Jan 2014</p>
                      <p>Instant Winner</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-trophy message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 14th Jan 2014</p>
                      <p>Instant Winner</p>
                    </div>
                  </div>
                </div>
                <!-- /comment -->                 
                
                <div class="msg-time-chat" id="blank-activity"><i class="message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text"> 
                      <p class="attribution"><a href="#" class="name">hi</a> at <span class="timestamp">1:55pm, 13th April 2013</span></p>
                      <p class="msg">Hello, How are you brother?</p>
                    </div>
                  </div>
                </div>

              </div>
	</div>
	<div class="tab-pane" id="activity-Tickets">
              <div class="timeline-messages"> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-user message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th April 2013</p>
                      <p>Hello, How are you brother?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-gift message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 13th April 2013</p>
                      <p>I'm Fine, Thank you. What about you? How is going on?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
              </div>
	</div>
	<div class="tab-pane" id="activity-Reg">
              <div class="timeline-messages"> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-user message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th April 2013</p>
                      <p>Hello, How are you brother?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-gift message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 13th April 2013</p>
                      <p>I'm Fine, Thank you. What about you? How is going on?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
              </div>
	</div>
	<div class="tab-pane" id="activity-Prizes">
              <div class="timeline-messages"> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-user message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th April 2013</p>
                      <p>Hello, How are you brother?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-gift message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 13th April 2013</p>
                      <p>I'm Fine, Thank you. What about you? How is going on?</p>
                    </div>
                  </div>  
                </div>
                <!-- /comment --> 
                
              </div>
	</div>
	<div class="tab-pane" id="activity-Users">
              <div class="timeline-messages"> 
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-user message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-in"> <span class="arrow"></span>
                    <div class="text"> 
                      <p class="attribution"><a href="#">John Doe</a> at 1:55pm, 13th April 2013</p>
                      <p class="msg">Hello, How are you brother?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 
                
                <!-- Comment -->
                <div class="msg-time-chat"><i class="icon-gift message-img" style="font-size:55px;"></i>
                  <div class="message-body msg-out"> <span class="arrow"></span>
                    <div class="text">
                      <p class="attribution"> <a href="#">Dale Steyn</a> at 2:01pm, 13th April 2013</p>
                      <p>I'm Fine, Thank you. What about you? How is going on?</p>
                    </div>
                  </div>
                </div>
                <!-- /comment --> 


              </div>
	</div>
</div>
            </div>
          </div>
        </div>            
</section>
<?php /*
<section id="attendees">
<h1>Attendees</h1>

</section>
<section id="users"> 
<h1>Users</h1>
</section>
*/ ?>