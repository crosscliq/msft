<!DOCTYPE html>
<html lang="en" class="default <?php echo @$html_class; ?>" >
<head>
    <?php echo $this->renderLayout('common/head.php'); ?>
</head>
<body>



<div class="container">
  <div class="top-navbar header b-b"> <a data-original-title="Toggle navigation" class="toggle-side-nav pull-left" href="#"><i class="icon-reorder"></i> </a>
    <div class="brand pull-left"> <a href="/"><img src="/dash/images/logo.png"></a></div>
  </div>
</div>
  
<div class="wrapper">

  <div class="left-nav">
    <div id="side-nav">
  <tmpl type="modules" name="nav" />
  </div>
  </div>


  <div class="page-content">
   	 <tmpl type="system.messages" />
     <tmpl type="view" />
  </div>
 </div>
 </div>
<?php echo $this->renderLayout('common/footer.php'); ?>
<?php echo $this->renderLayout('common/pusher.php'); ?>
<script type="text/javascript" src="/dash/javascript/jquery.jqplot.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.barRenderer.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.highlighter.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.cursor.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.canvasTextRenderer.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.canvasAxisTickRenderer.min.js"></script> 
<script type="text/javascript" src="/dash/javascript/jqplot.pieRenderer.min.js"></script> 

<script type="text/javascript">
$(document).ready(function(){
  var data = [
    ['Ticketed', <?php echo $event['wristbands']['withTicketsOnly']; ?>],['Retail', 9], ['Light Industry', 14], 
    ['Out of home', 16],['Commuting', 7], ['Orientation', 9]
  ];
  var plot1 = jQuery.jqplot ('chart7', [data], 
    { 
      seriesDefaults: {
        // Make this a pie chart.
        renderer: jQuery.jqplot.PieRenderer, 
        rendererOptions: {
          // Put data labels on the pie slices.
          // By default, labels show the percentage of the slice.
          showDataLabels: true
        }
      }, 
      legend: { show:true, location: 'e', showSwatches: true}
    }
  );
});
</script>

</body>
</html>
