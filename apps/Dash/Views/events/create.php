<?php //echo \Dsc\Debug::dump( $flash->get('old'), false ); ?>

<div class="row">
<div class="col-lg-6">
    <div class="widget">
            <div class="widget-header"> <i class="icon-plus-sign"></i>
              <h3>Create Event</h3>
            </div>
    <div class="widget-content">
   <div class="body">
<form id="detail-form" action="/event/add" class="form" method="post">
<div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Event Name</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
			 <input type="text" name="name" placeholder="Event Name" value="<?php echo $flash->old('name'); ?>" class="form-control"> 
                    </div>
                    </div>
                  </div>
<div class="control-group">
                 <div class="col-md-3">
                    <label for="normal-field" class="control-label">Event ID</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
			 <input type="text" name="event_id" placeholder="Event ID" value="<?php echo $flash->old('event_id'); ?>"  class="form-control"> 
                    </div>
                    </div>
                  </div>
<div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Dates</label>
                  </div>

                  <div class="col-md-4">
		     <div class="input-group"> <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    <input type="text" placeholder="Start Date" value="<?php echo $flash->old('dates.start_date' ); ?>" size="16" class="form-control mask" id="dates[start_date]" data-inputmask="'alias': 'date'">
                   </div>
                  </div>
                 <div class="col-md-4">
		     <div class="input-group"> <span class="input-group-addon"><i class="icon-calendar"></i></span>
                    <input type="text" placeholder="End Date" value="<?php echo $flash->old('dates.end_date' ); ?>" size="16" class="form-control mask" id="dates[end_date]" data-inputmask="'alias': 'date'">
                   </div>
                  </div>
</div>

<div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Times</label>
                  </div>

                 <div class="col-md-4">
		     <div class="input-group"> <span class="input-group-addon"><i class="icon-time"></i></span>
                        <input type="text" placeholder="Start time" value="<?php echo $flash->old('dates.start_time' ); ?>" size="16" class="form-control mask" id="dates[start_time]">
                    </div>
                   </div>

                  <div class="col-md-4">
		     <div class="input-group"> <span class="input-group-addon"><i class="icon-time"></i></span>
                        <input type="text" placeholder="End time" value="<?php echo $flash->old('dates.end_time' ); ?>" size="16" class="form-control mask" id="dates[end_time]">
                    </div>
                   </div>
</div>
<div class="control-group">		
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Category</label>
                  </div>

                  <div class="col-md-4">
		     <div class="input-group">
				<?php $categories =  array('NSO'=> 'New Store Opening', 'XBOX'=> 'Xbox Event', 'HR'=> 'Human Resources', ); ?>
				<select name="category" class="form-control">
				  <?php foreach ($categories as $value => $text) : ?>
				  <option value="<?=$value?>" <?php if($value == $flash->old('category')){ echo 'selected="selected"';} ;?> > <?=$text?>
				  <?php endforeach; ?>
				</select>
                    </div>
                   </div>
</div>


<div class="control-group">
                  <div class="col-md-3">
                    <label for="normal-field" class="control-label">Normal field</label>
                    </div>
                    <div class="col-md-9">
                    <div class="form-group">
                      <input type="text" placeholder="May have placeholder" class="form-control" id="normal-field">
                    </div>
                    </div>
</div>


		</div>
</div>
         



   <div class="form-group">

   <label>Address</label><br>
   <input type="text" name="address[street]" placeholder="Street" value="<?php echo $flash->old('address.street') ?>" >
   <br>
   <input type="text" name="address[city]" placeholder="City" value="<?php echo $flash->old('address.city'); ?>" >

   <input type="text" name="address[state]" placeholder="State" value="<?php echo $flash->old('address.state'); ?>" >
  	 <br>
   <input type="text" name="address[zip]" placeholder="Zip" value="<?php echo $flash->old('address.zip'); ?>" >
   
   <input type="text" name="address[country]" placeholder="Country" value="<?php echo $flash->old('address.country'); ?>" >
   <br>
   <label>Wristbands</label><br>
   # <input type="text" name="wristbands[ordered]" placeholder="wristbands" value="<?php echo $flash->old('wristbands.ordered'); ?>" ><br>
   	<br>
    <label>Attendees</label><br>
   # <input type="text" name="attendees" placeholder="Attendee Limit" value="<?php echo $flash->old('attendees'); ?>" ><br>
   
   <br>
   <input type="hidden" name="submitType" value="save_close";>      
   <button type="submit">Save</button>
</form>
</div></div></div>


</div>
</div>
