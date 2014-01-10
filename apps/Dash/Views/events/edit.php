<?php // echo \Dsc\Debug::dump( $flash->get('old'), false ); ?>

<script src="./ckeditor/ckeditor.js"></script>
<script>
jQuery(document).ready(function(){
    CKEDITOR.replaceAll( 'wysiwyg' );    
});

</script>

<form id="detail-form" action="" class="form" method="post">
   <input type="text" name="name" placeholder="Event Name" value="<?php echo $flash->old('name'); ?>" >
   <input type="hidden" name="submitType" value="save_close";>      
   <button type="submit">Save</button>
</form>




<h2>Shae can you make this form</h2>
<pre>
<?php echo __FILE__; ?>
</pre>