<?php 
namespace Dash\Site\Controllers\Event;

class User extends \Dash\Site\Controllers\BaseAuth  
{
    use \Dsc\Traits\Controllers\CrudItemCollection;
    
    protected $list_route = '/';
    protected $create_item_route = '/user/create';
    protected $get_item_route = '/user/view/{id}';    
    protected $edit_item_route = '/user/edit/{id}';
    
    public function __construct() {
        $f3 = \Base::instance();
        $this->list_route = '/'. $f3->get('PARAMS.eventid').'/users/';
        $this->create_item_route = '/'. $f3->get('PARAMS.eventid').'/user/create';
        $this->get_item_route = '/'. $f3->get('PARAMS.eventid').'/user/view/{id}';
        $this->edit_item_route = '/'. $f3->get('PARAMS.eventid').'/user/edit/{id}';

        parent::__construct();
    }
    
    protected function getModel($name='Users')
    {
        switch (strtolower($name)) 
        {
            case "group":
            case "groups":
                $model = new \Users\Models\Groups;
                break;
            default:
                $model = new \Dash\Site\Models\Event\Users;
                break;              
        }
        
        return $model;
    }


    
    protected function getItem()
    {
        $f3 = \Base::instance();
        $id = $this->inputfilter->clean( $f3->get('PARAMS.id'), 'alnum' );
        $model = $this->getModel()
        ->setState('filter.id', $id);
        
        try {
            $item = $model->getItem();
        } catch ( \Exception $e ) {
            \Dsc\System::instance()->addMessage( "Invalid Item: " . $e->getMessage(), 'error');
            $f3->reroute( $this->list_route );
            return;
        }
    
        return $item;
    }
    
    protected function displayCreate()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Create User');

        $model = $this->getModel('groups');
        $groups = $model->getList();
        \Base::instance()->set('groups', $groups ); 

        $model = new  \Dash\Site\Models\Event\Roles;
        $roles = $model->getItems();
      
         \Base::instance()->set('roles', $roles );

        //$view = \Dsc\System::instance()->get('theme');
        //$view->event = $view->trigger( 'onDisplayAdminUserEdit', array( 'item' => $this->getItem(), 'tabs' => array(), 'content' => array() ) );
        
        //echo $view->render('Users/Admin/Views::users/create.php');
        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('Dash/Site/Views::event/users/create.php');

    }
    
    protected function displayEdit()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Edit User');
        
        $model = $this->getModel('groups');
        $groups = $model->getList();
        \Base::instance()->set('groups', $groups );     

        $model = new  \Dash\Site\Models\Event\Roles;
        $roles = $model->getList();
         \Base::instance()->set('roles', $roles );

        $view = \Dsc\System::instance()->get( 'theme' );
        echo $view->render('Dash/Site/Views::event/users/edit.php');


        //$view = \Dsc\System::instance()->get('theme');
        //$view->event = $view->trigger( 'onDisplayAdminUserEdit', array( 'item' => $this->getItem(), 'tabs' => array(), 'content' => array() ) );
                
        //echo $view->render('Users/Admin/Views::users/edit.php');
    }
    
    /**
     * This controller doesn't allow reading, only editing, so redirect to the edit method
     */
    protected function doRead(array $data, $key=null)
    {
        $f3 = \Base::instance();
        $id = $this->getItem()->get( $this->getItemKey() );
        $route = str_replace('{id}', $id, $this->edit_item_route );
        $f3->reroute( $route );
    }
    
    protected function displayRead() {}

    protected function doAdd($data) 
    {

        if (empty($this->list_route)) {
            throw new \Exception('Must define a route for listing the items');
        }
                
        if (empty($this->create_item_route)) {
            throw new \Exception('Must define a route for creating the item');
        }
                
        if (empty($this->edit_item_route)) {
            throw new \Exception('Must define a route for editing the item'); 
        }
        
       
        if (!isset($data['submitType'])) {
            $data['submitType'] = "save_edit";
        }
        
        $f3 = \Base::instance();
        $flash = \Dsc\Flash::instance();
        $model = $this->getModel();
        
        // save
        try {
            $values = $data;
            unset($values['submitType']);
            //\Dsc\System::instance()->addMessage(\Dsc\Debug::dump($values), 'warning');
            $this->item = $model->create($values);
        }
        catch (\Exception $e) {
            \Dsc\System::instance()->addMessage('Save failed with the following errors:', 'error');
            if (\Base::instance()->get('DEBUG')) {
                \Dsc\System::instance()->addMessage($e, 'error');
            } else {
                \Dsc\System::instance()->addMessage($e->getMessage(), 'error');
            }
            
            foreach ($model->getErrors() as $error)
            {
                if (\Base::instance()->get('DEBUG')) {
                    \Dsc\System::instance()->addMessage($error, 'error');
                } else {
                    \Dsc\System::instance()->addMessage($error->getMessage(), 'error');
                }                
            }
            
            if ($f3->get('AJAX')) {
                // output system messages in response object
                return $this->outputJson( $this->getJsonResponse( array(
                        'error' => true,
                        'message' => \Dsc\System::instance()->renderMessages()
                ) ) );
            }
            
            // redirect back to the create form with the fields pre-populated
            \Dsc\System::instance()->setUserState('use_flash.' . $this->create_item_route, true);
            $flash->store($data);
            
            $this->setRedirect( $this->create_item_route );
                        
            return false;
        }
                
        // redirect to the editing form for the new item
        \Dsc\System::instance()->addMessage('Item saved', 'success');
        
        if (method_exists($this->item, 'cast')) {
            $this->item_data = $this->item->cast();
        } else {
            $this->item_data = \Joomla\Utilities\ArrayHelper::fromObject($this->item);
        }
        
        if ($f3->get('AJAX')) {
            return $this->outputJson( $this->getJsonResponse( array(
                    'message' => \Dsc\System::instance()->renderMessages(),
                    'result' => $this->item_data
            ) ) );
        }
        
        switch ($data['submitType']) 
        {
            case "save_new":
                $route = $this->create_item_route;
                break;
            case "save_close":
                $route = $this->list_route;
                break;
            default:
                $flash->store($this->item_data);
                $id = $this->item->get( $this->getItemKey() );
                $route = str_replace('{id}', $id, $this->edit_item_route );                
                break;
        }

        $this->setRedirect( $route );
        
        return $this;
    }


}

