<?php 
 //$model = new \Admin\Models\Menus;
 //$model->setState('filter.parent', '52c25c8a33231ab2798b4568')->setState('order_clause', array( 'tree'=> 1, 'lft' => 1 ));
 //$list = $model->getList();



$primary = array();
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-dashboard' , 'details' => array('url' => '/'), 'title' => 'Dashboard' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-calendar' , 'details' => array('url' => '/events'), 'title' => 'Events' );
$primary[] = array('published' => 1,'class' => '', 'icon' => 'icon-user' , 'details' => array('url' => '/users'), 'title' => 'Users' );


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
