

<?php //echo \Dsc\Debug::dump( $this->app->hive(), false ); ?>

<!-- JAVASCRIPTS -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="/site/js/hitua.js"></script>

	  <script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
<script>
	
	 // Enable pusher logging - don't include this in production
    Pusher.log = function(message) {
      if (window.console && window.console.log) {
        window.console.log(message);
      }
    };

    var pusher = new Pusher("<?php echo \Base::instance()->get('pusher_key');?>");
    var channel = pusher.subscribe('<?php echo \Base::instance()->get("eventid");?>');
   

</script>