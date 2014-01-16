<?php  $maps = new \Dash\Models\Bingmap;?>
<div class="content container">
                              <div class="row">
                                <div class="col-lg-12">
                                  <h2 class="page-title">EVENT MANAGEMENT <small>DASHBOARD</small></h2>
                                </div>
                              </div>


                              <!-- PORTFOLIO UNIT -->
    <section id="events" class="color-light text-center">     
        
          <div class="row">
            <div class="col-md-6 col-md-offset-3">
              <div id="filters" class="text-center btn-group">
            
                  <div  class="hidden-xs btn-group btn-group-justified">
                    <a class="filter btn btn-primary active" data-filter="*" href="#">All</a>
                    <a class="filter btn btn-primary" data-filter=".NSO" href="#">NSO</a>
                    <a class="filter btn btn-primary" data-filter=".XBOX" href="#">Xbox</a>
                    <a class="filter btn btn-primary" data-filter=".HR" href="#">HR</a>
                  </div>
                  <div class="visible-xs">
                     <select id="e1" class="form-control">
                      <option value="*">All</option>
                      <option value=".NSO">NSO</option>
                      <option value=".XBOX">Xbox</option>
                      <option value=".HR">HR</option>
                    </select>
                  </div>
              </div>
            </div>
          </div>

          <div class="container">
            <div id="filter-items" class="row">
              <?php foreach ($list as $item) :?>

              <div class="col xs-12 col-sm-4 <?=$item['category'];?> item">
                <div class="filter-content">
                        <div class="widget-container">
                    
                                  <div class="stats-heading"><span class="pull-left"><small><?=$item['category'];?></small></span><?=$item['name'];?></div>
                                    <div class="padded text-center">
                                      <a href="/<?=$item['event_id'];?>/dashboard/" class=""><img src="<?php echo $maps->width('200')->height('100')->location(@$item["address"]["city"].', '.@$item["address"]["state"])->getImageURL(); ?>"></a> 
                                      <br style="clear:both;" />
                                                  <div class="text-center padder m-t"><small><a href="/<?=$item['event_id'];?>/dashboard/" class="btn btn-default btn-xs">Event Details</a></small> </div>
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




                </div>
              </div>
              <?php endforeach; ?>




  
    </section>
 
    
    </div>
