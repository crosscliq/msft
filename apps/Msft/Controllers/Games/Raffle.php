<?php 
namespace Msft\Controllers\Games;

class Raffle extends \Msft\Controllers\BaseAuth 
{	

    public function winners() {

    }

    public function play() {
        //ACL CHECKS

        $result = $this->doPlay();
    }

    protected function doPlay() {

        
   

    }


    protected function pickWinner(){

    }

    protected function pickPrize(){
        
    }


    
}
?> 