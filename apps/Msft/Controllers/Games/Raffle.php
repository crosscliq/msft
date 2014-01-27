<?php 
namespace Msft\Controllers\Games;

class Raffle extends \Msft\Controllers\BaseAuth 
{	

    public function winners() {

    }

    public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = new \Dsc\Template;
        echo $view->render('/games/raffle/start.php');
    }



    public function play() {
        //ACL CHECKS
        $game = $this->doPlay();

        \Base::instance()->set('game',  $game);
      
        $view = new \Dsc\Template;
        echo $view->render('/games/raffle/play.php');


    }

    protected function doPlay() {

       $winner = $this->pickWinner();
       $prize = $this->pickPrize();

    $play = array('winner' => $winner , 'prize' => $prize);
    return $play;
    }


    protected function pickWinner(){

        $model = new \Msft\Models\Attendees;
        $model->setState('filter.profile.complete', 1);
        $winner =  $model->setFilter('games.raffle.winner', null)->getRandomItem();
        if(!$winner) {
                \Base::instance()->reroute('/games/raffle/nomorewinners');
        }
        $winner->set('games.raffle.winner', \Dsc\Mongo\Metastamp::getDate('now'));
        $winner->save();


        
        return $winner;
     
    }

    protected function pickPrize(){
        return '';
    }


    public function nomorewinners() {
       
        $view = new \Dsc\Template;
        echo $view->render('/games/raffle/nomorewinners.php');


    }

    
}
?> 