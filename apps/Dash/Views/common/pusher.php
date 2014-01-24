

<?php //echo \Dsc\Debug::dump( $this->app->hive(), false ); ?>

    <script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
<script>
  

    var pusher = new Pusher('349ec13c5950c62522ea');
    var channel = pusher.subscribe('<?php echo \Base::instance()->get("eventid");?>');

    console.log('<?php echo \Base::instance()->get("eventid");?>');

    // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    // Update Wristband Total
	channel.bind('updateWbTotal', function(data) {
	  $('.wbTotal').html(data.message);
	});

    // Update Wristband Available
	channel.bind('updateWbAvailable', function(data) {
	  $('.wbAvailable').html(data.message);
	});

    // Update Attendee Total
	channel.bind('updateATotal', function(data) {
	  $('.aTotal').html(data.message);
	});

    // Update Attendee Available
	channel.bind('updateAAvailable', function(data) {
	  $('.aAvailable').html(data.message);
	});


    // Update Ticket Total
	channel.bind('updateTTotal', function(data) {
	  $('.tTotal').html(data.message);
	});

    // Update Ticket Available
	channel.bind('updateTAvailable', function(data) {
	  $('.tAvailable').html(data.message);
	});

    // Update Empty Total
	channel.bind('updateETotal', function(data) {
	  $('.eTotal').html(data.message);
	});



</script>