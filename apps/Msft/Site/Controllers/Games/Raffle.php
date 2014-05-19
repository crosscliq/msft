<?php 
namespace Msft\Site\Controllers\Games;

class Raffle extends \Msft\Site\Controllers\BaseAuth 
{	

    public function winners() {

    }

    public function display()
    {
        \Base::instance()->set('pagetitle', 'Home');
        \Base::instance()->set('subtitle', '');
                
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('/games/raffle/start.php');
    }



    public function play() {
        //ACL CHECKS
        $game = $this->doPlay();

        \Base::instance()->set('game',  $game);
      
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('/games/raffle/play.php');


    }

    protected function doPlay() {

       $winner = $this->pickWinner();
       $prize = $this->pickPrize();

        //$activity = new \Msft\Models\Activity;
        //$activity->create(array('type'=> 'raffle', 'action' => 'play', 'winner' => $winner->cast(), 'prize' => $prize  ));
       


    $play = array('winner' => $winner , 'prize' => $prize);
    return $play;
    }


    protected function pickWinner(){

        $model = new \Msft\Models\Attendees;

        $yday = getdate();
       
        $model->setCondition('first_name', array('$ne' => null));
        $model->setCondition('last_name', array('$ne' => null));
        $model->setCondition('phone', array('$ne' => null));
        $model->setCondition('created.yday', $yday['yday']);
        $model->setCondition('games.raffle.winner', array('$exists' => false));
        $winner =  $model->getRandomItem();

        if(!$winner) {
                \Base::instance()->reroute('/games/raffle/nomorewinners');
        }

        $winner->set('games.raffle.winner', \Dsc\Mongo\Metastamp::getDate('now'));
       // $winner->save();
        
        return $winner;
     
    }

    protected function pickPrize(){
        return '';
    }


    public function nomorewinners() {
    
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('/games/raffle/nomorewinners.php');

    }

    
}
?> 
