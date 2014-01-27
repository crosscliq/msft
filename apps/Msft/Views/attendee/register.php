 <header class="bg-dark border" data-load="/header"></header>
    <div class="container">

        <div class="grid">
          <div class="row">
            <div class="span12">
             <br/>
                <form method="post" action="<?php echo $PARAMS[0]?>">
                        <fieldset>
                                <legend>Customer Profile</legend>
                                             <div class="input-control select">
                                        <label>Gender</label>
                                                <select name="gender" >
                                                        <option>Male</option>
                                                        <option>Female</option>
                                                </select>
                                             </div><br/><br/>
                                             <div class="input-control range">
                                        <label>Age Estimate ( 10 - 110 )</label>
                                             <span id="ageval"></span>
                                             <input type="range" name="age" min="10" max="110" value="<?php echo $flash->old('age'); ?>" onchange="updateRange(value)">
                                             </div><br/><br/>
                                             <div class="input-control text">
						<input type="text" value="" placeholder="Zip Code"/>
                                             </div><br/><br/><br/>
                                        <input type="hidden" name="tagid" value="<?=$tagid?>">
                                        <input type="hidden" name="submitType" value="save_customer">
                                        <input type="submit" value="Register" class="btn large inverse">
						<br/><br/>
					     <a class="button large warning">Already Registered?</a>
                                    </fieldset>
                                </form>
            </div>
          </div>
        </div>


        <div class="page-footer">
            <div class="page-footer-content">
                <!--<div data-load="header.html"></div>-->
            </div>
        </div>
    </div>
 <script type="text/javascript">
        
                function updateRange(e)  {
                        $('#ageval').text(e);
                };
        
        </script>
