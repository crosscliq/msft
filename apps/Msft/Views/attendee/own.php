
    <div class="container">
  
    <div class="grid">
      <div class="row">
        <div class="span12" style="text-align:center;">
           <h1 class="fg-white"><?php echo $SESSION['event']->name;?></h1>
		<hr/>
            <h2 class="fg-white"><?php echo $SESSION['event']->dates['start_date'];?></h2>
        </div>
      </div>
    </div>

        <div class="page-footer">
            <div class="page-footer-content">
            <?php if(@$showselfregister) : ?>
            <div id="role" style="text-align:center;">
            <a href="/band/<?php echo $tagid; ?>/selfsignup" class="button large inverse fg-white" style="width:80%; margin-bottom:25px;background:rgba(229,10,10,0.6)!important">Register your wristband</a>
            </div><br><br>
            <div id="role" style="text-align:center;">
            <a href="/attendee/signin/<?php echo$tagid; ?>" class="button large warning">Already Registered?</a>
            </div>
             
            <?php endif; ?>
            </div>
        </div>
    </div>
