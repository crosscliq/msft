<?php 
namespace Msft\Site\Controllers;

class Users extends BaseAuth 
{
  
    protected function getModel() {
        $model = new \Msft\Models\Users;
        return $model;
    }
    


   public function roles($f3) {
        $user = $this->getIdentity();
         
         var_dump( $user); 
         die();

        $f3->set('roles', $user->roles);
    
        $pusher = new \Pusher($f3->get('pusher_key'), $f3->get('pusher_secret'), $f3->get('pusher_app_id'));
        $pusher->trigger('rolestest', 'test', array( 'msg' => 'hi working'));

        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('Msft/Site/Views::roles/list.php');
   }


   public function role($f3) {
   		  
        $model = new \Msft\Models\Roles;
        $role = $model->setState('filter.id', $f3->get('PARAMS.roleid'))->getItem(); 
        $f3->set('SESSION.active_role', $role['type']);

        switch ($role['type']) {
            case 'attendee_registration':
               $f3->reroute('/attendee');
                break;
             case 'prize_patrol':
               $f3->reroute('/prizepatrol');
                break;
            case 'meet_greet':
               $f3->reroute('/meetgreet');
                break;
            case 'ticketing':
               $f3->reroute('/ticketing');
                break;
            case 'mc':
               $f3->reroute('/mc');
                break;
            case 'band_transfer':
               $f3->reroute('/transfer');
                break;
            case 'gate_keeper':
               $f3->reroute('/gatekeeper');
                break;
            default:
                # code...
                break;
        }
       
   }
    
}
?> 