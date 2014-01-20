<?php 




$primary = array();
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-dashboard' , 'details' => array('url' => '/'), 'title' => 'Dashboard' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-dashboard' , 'details' => array('url' => $PARAMS[0]."#stats"), 'title' => 'Event Details' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-calendar' , 'details' => array('url' => $PARAMS[0]."#attendees"), 'title' => 'Attendees' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-user' , 'details' => array('url' => $PARAMS[0]."#users"), 'title' => 'Users' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-user' , 'details' => array('url' => $PARAMS[0]."#roles"), 'title' => 'Roles' );


?>
      <ul id="nav">
      <?php foreach($primary as $item) : ?>
      <?php if($item['published']) : ?>
      <li class="<?php echo $item['class']; ?> 

    <?php if($item['details']['url'] == $PARAMS[0]) { echo 'current'; } ?>"> <a href="<?php echo $item['details']['url']; ?>">

    
         <?php if(strlen($item['icon'])) : ?>
       <i class="<?php echo $item['icon']; ?> "></i>
         <?php endif; ?>
        <?php echo $item['title']; ?> 

       </a> </li>
      <?php endif; ?>
      <?php  endforeach; ?>
      </ul>
