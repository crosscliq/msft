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
      <ul id="nav">
        <li class="current"> <a href="/dash"> <i class="icon-dashboard"></i> Dashboard </a> </li>
        <li> <a href="/admins"> <i class="icon-key"></i> Admins </a> </li>
        <li> <a href="/users"> <i class="icon-user"></i> Users </a> </li>
        <li> <a href="/events"> <i class="icon-calendar"></i> Events </a> </li>
        <li> <a href="/prizes"> <i class="icon-gift"></i> Prizes </a> </li>
        <li> <a href="/attendees"> <i class="icon-group"></i> Attendees </a> </li>
        <li> <a href="/tags"> <i class="icon-tag"></i> Wristbands </a> </li>

      </ul>
    </div>
  </div>

  <div class="page-content">
   	 <tmpl type="system.messages" />
     <tmpl type="view" />
  </div>
 </div>
 </div>
<?php echo $this->renderLayout('common/footer.php'); ?>
</body>
</html>