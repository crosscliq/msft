 <header class="bg-dark border" data-load="/header"></header>
    <div class="container">
  
    <div class="grid">
      <div class="row">
        <div class="span12">
            <?php foreach ($roles as $role) : ?>

                <div id="role">
                    <a href="/active/role/<?php echo $role['id'] ?>">
                        <?php echo $role['name']; ?>
                    </a>
                </div>


            <?php endforeach; ?>

        </div>
      </div>
    </div>
   
        <div class="page-footer">
            <div class="page-footer-content">
                <!--<div data-load="header.html"></div>-->
            </div>
        </div>
    </div>