  <script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
<script>
	
	 // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher("<?php echo  \Base::instance()->get('pusher_key');?>");
    var channel = pusher.subscribe(<?php echo  \Base::instance()->get('eventid');?>);
   

</script>