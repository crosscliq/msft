<?php //echo \Dsc\Debug::dump( $flash->get('old'), false ); ?>

<script src="./ckeditor/ckeditor.js"></script>
<script>
jQuery(document).ready(function(){
    CKEDITOR.replaceAll( 'wysiwyg' );    
});

</script>
    <div class="widget">
            <div class="widget-header"> <i class="icon-plus-sign"></i>
              <h3>Create Event</h3>
            </div>
    <div class="widget-content">
   <div class="body">
<form id="detail-form" action="/event/add" class="form" method="post">
   <input type="text" name="name" placeholder="Event Name" value="<?php echo $flash->old('name'); ?>" > <br>
   <input type="text" name="event_id" placeholder="Event ID" value="<?php echo $flash->old('event_id'); ?>" ><br>
   <div class="form-group">
                        <label>Dates:</label>
                        <div class="row">
                            <div class="col-md-6">
                               Start Date <input name="dates[start_date]" value="<?php echo $flash->old('dates.start_date' ); ?>" class="ui-datepicker form-control" type="text" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" data-date-today-btn="true">
                            </div>
                            <div class="input-group col-md-6">
                              Start Time   <input name="dates[start_time]" value="<?php echo $flash->old('dates.start_time' ); ?>" type="text" class="ui-timepicker form-control" data-default-time="false" data-show-meridian="false" data-show-inputs="false">
                                <span class="input-group-addon"><i class="icon-clock"></i></span>
                            </div>
                        </div>
                    	<div class="row">
                            <div class="col-md-6">
                               End Date <input name="dates[end_date]" value="<?php echo $flash->old('dates.end_date' ); ?>" class="ui-datepicker form-control" type="text" data-date-format="yyyy-mm-dd" data-date-today-highlight="true" data-date-today-btn="true">
                            </div>
                            <div class="input-group col-md-6">
                              End Time   <input name="dates[end_time]" value="<?php echo $flash->old('dates.end_time' ); ?>" type="text" class="ui-timepicker form-control" data-default-time="false" data-show-meridian="false" data-show-inputs="false">
                                <span class="input-group-addon"><i class="icon-clock"></i></span>
                            </div>
                        </div>
                    </div>
   <?php $categories =  array('NSO'=> 'New Store Opening', 'XBOX'=> 'Xbox Event', 'HR'=> 'Human Resources', ); ?>
   <br>
   <label>Category</label><br>
   <select name="category">
   <?php foreach ($categories as $value => $text) : ?>
   <option value="<?=$value?>" <?php if($value == $flash->old('category')){ echo 'selected="selected"';} ;?> > <?=$text?>
   <?php endforeach; ?>
   </select>
   <br>
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



<h2>Shae can you make this form</h2>
<pre>
<?php echo __FILE__; ?>
</pre>