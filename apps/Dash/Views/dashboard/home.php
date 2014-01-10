<?php 

$maps = new \Dash\Models\Bingmap;?>
<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h2 class="page-title">EVENT MANAGEMENT <small>DASHBOARD</small></h2>
                                </div>
                              </div>
              <div class="row">
        
                          <div class="col-md-3 pull-right">
                                  <div class="btn-group btn-group-justified">
                                    <a class="filter btn btn-primary" data-filter="all">All</a>
                                    <a class="filter btn btn-primary" data-filter="category_1">NSO</a>
                                    <a class="filter btn btn-primary active" data-filter="category_2">Xbox</a>
                                    <a class="filter btn btn-primary" data-filter="category_3">HR</a>
                                  </div>
                          </div>
        </div>
        <div class="row">
                            <ul id="grid" class="row">
                              <li class="mix category_1 col-md-3 col-xs-12 col-sm-6" data-cat="1">
                          
                                  <div class="widget-container">
                                    <div class="stats-heading"><span class="pull-left"><small>NSO</small></span>City Creek Mall</div>
                                    <div class="padded text-center">
                                      <a href="#123" class=""><img src="<?php echo $maps->width('200')->height('100')->location('Salt lake City, Utah')->getImageURL(); ?>"></a> 
                                      <br style="clear:both;" />
                                                  <div class="text-center padder m-t"><small><a href="#" class="btn btn-default btn-xs">Event Details</a></small> </div>
                                              </div>
                                              <div class="widget-footer lt">
                                                  <div class="row">
                                  <div class="col-xs-3"> <small class="text-muted block">Line:</small> <span>1/24/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Concert:</small> <span>1/24/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Wristbands:</small> <span>300</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Attendees:</small> <span>220</span> </div>
                                  </div>
                                          </div>
                                  </div>
                                    
                              </li>
                              <li class="mix category_2 col-md-3 col-xs-12 col-sm-6" data-cat="2">

                                  <div class="widget-container">
                                    <div class="stats-heading"><span class="pull-left"><small>Xbox</small></span>Assasins Creed Launch Miami</div>
                                    <div class="padded text-center">
                                      <a href="#" class=""><img src="http://maps.googleapis.com/maps/api/staticmap?center=Miami,%20Fl&zoom=6&size=250x100&maptype=roadmap&sensor=false"></a> 
                                      <br style="clear:both;" />
                                                  <div class="text-center padder m-t"><small><a href="#" class="btn btn-default btn-xs">Event Details</a></small> </div>
                                              </div>
                                              <div class="widget-footer lt">
                                                  <div class="row">
                                  <div class="col-xs-3"> <small class="text-muted block">Line:</small> <span>12/13/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Concert:</small> <span>12/14/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Wristbands:</small> <span>852</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Attendees:</small> <span>754</span> </div>
                                  </div>
                                          </div>
                                  </div>
                          
                              </li>
                              <li class="mix category_3 col-md-3 col-xs-12 col-sm-6" data-cat="3">

                                  <div class="widget-container">
                                    <div class="stats-heading"><span class="pull-left"><small>HR</small></span>MGX15</div>
                                    <div class="padded text-center">
                                      <a href="#" class=""><img src="http://maps.googleapis.com/maps/api/staticmap?center=Atlanta,%20Ga&zoom=6&size=250x100&maptype=roadmap&sensor=false"></a> 
                                      <br style="clear:both;" />
                                                  <div class="text-center padder m-t"><small><a href="#" class="btn btn-default btn-xs">Event Details</a></small> </div>
                                              </div>
                                              <div class="widget-footer lt">
                                                  <div class="row">
                                  <div class="col-xs-3"> <small class="text-muted block">Line:</small> <span>3/20/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Concert:</small> <span>3/24/14</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Wristbands:</small> <span>750</span> </div>
                                  <div class="col-xs-3"> <small class="text-muted block">Attendees:</small> <span>550</span> </div>
                                  </div>
                                          </div>
                                  </div>
                          
                              </li>
                            </ul>
            </div>
    </div>
