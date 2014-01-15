<?php 
namespace Dash\Controllers;


Class User extends \Users\Admin\Controllers\User {

	protected $list_route = '/users';
	protected $create_item_route = '/user';
	protected $get_item_route = '/user/{id}';
	protected $edit_item_route = '/user/{id}/edit';

	public function beforeRoute($f3){
        $user = $f3->get('SESSION.dash.user');
        if(empty($user)){
            $f3->reroute('/login');
        }
    } 

    protected function getModel()
	{
		$model = new \Dash\Models\Users;
		return $model;
	}

	
}




?>