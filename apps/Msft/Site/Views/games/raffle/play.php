<?php 
function formatPhoneNumber($s) {
$rx = "/
    (1)?\D*     # optional country code
    (\d{3})?\D* # optional area code
    (\d{3})\D*  # first three
    (\d{4})     # last four
    (?:\D+|$)   # extension delimiter or EOL
    (\d*)       # optional extension
/x";
preg_match($rx, $s, $matches);
if(!isset($matches[0])) return false;

$country = $matches[1];
$area = $matches[2];
$three = $matches[3];
$four = $matches[4];
$ext = $matches[5];

$out = "$three-$four";
if(!empty($area)) $out = "($area) $out";
//if(!empty($country)) $out = "+$country$out";
//if(!empty($ext)) $out .= "x$ext";

// check that no digits were truncated
// if (preg_replace('/\D/', '', $s) != preg_replace('/\D/', '', $out)) return false;
return $out;
}



function format_telephone($phone_number)
{
    $cleaned = preg_replace('/[^[:digit:]]/', '', $phone_number);
   if(strlen($cleaned) > 4) {	
    preg_match('/(\d{3})(\d{3})(\d{4})/', $cleaned, $matches);
    return "({$matches[1]}) {$matches[2]}-{$matches[3]}";
 } else {
	return $cleaned;
}
}

?>


 
    <div class="container">
  
    <div class="grid">
      <div class="row">
        <div class="span12" style="padding-top:45px;">
		<legend>Winner</legend>
     
                <div id="role" style="text-align:center;">
			
			<h2 class="fg-white"><?php echo $game["winner"]["first_name"]; ?> <?php echo $game["winner"]["last_name"]; ?></h2>
			<br/>PHONE: <?php echo formatPhoneNumber($game["winner"]["phone"]); ?><br/>
			<br/>Registered: <?php echo $game["winner"]["created"]["local"]; ?><br/>
<form action="/games/raffle/play" method="post">
<button type="submit"  class="button large inverse fg-white" style="width:80%; margin-bottom:25px;background:rgba(0,0,0,0.6)!important">Play Again</button>
</form>
		
                </div>


             

        </div>
      </div>
    </div>
   
        <div class="page-footer">
            <div class="page-footer-content">

                <!--<div data-load="header.html"></div>-->
            </div>
        </div>
    </div>

