

<header class="bg-dark border" data-load="/header-cust"></header>
    <div class="container">
  
	<div class="grid">
	  <div class="row">
	    <div class="span12">
	    	     <br/>
		<form method="post" action="/attendee/customer/update/<?php echo $item->_id; ?>">
			<fieldset>
                <legend>Customer Info ( required )</legend><br>
                                        <label>First Name</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input name="first_name" type="text" placeholder="First name" value="<?php echo $flash->old('first_name'); ?>">
                                        </div>
                                        <label>Last Name</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input name="last_name" type="text" placeholder="Last name" value="<?php echo $flash->old('last_name'); ?>"  >
                                        </div>
                                        <label>Email</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input name="email" type="text" placeholder="Email Address" autofocus="" value="<?php echo $flash->old('email'); ?>">
                                        </div>
                                        <label>Phone</label>
                                        <div class="input-control text" data-role="input-control">
                                            <input name="phone" type="text" placeholder="Phone" value="<?php echo $flash->old('phone'); ?>" >
                                        </div>	
		<br/><br/>
           <legend></legend>
			
                                        <label>Receive offers/updates from Microsoft?</label>
                                        <div class="input-control checkbox">
                                            <input type="checkbox" checked>
						  <span class="check"></span>email
                                        </div>	<br/>
                                        <div class="input-control checkbox">
                                            <input type="checkbox" checked>
						  <span class="check"></span>sms
                                        </div><br/><br/>				
                                        <input type="hidden" name="submitType" value="save_confirm";>      
                                        <input type="submit" value="Register" class="inverse large">
                                    </fieldset>
                                </form>
	    </div>
	  </div>
	</div>
   

        <div class="page-footer">
            <div class="page-footer-content">
                <!--<div data-load="header.html"></div>-->
            </div>
        </div>
    </div>

   
<pre> File located
<?php echo __FILE__; ?>
</pre>