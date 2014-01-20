<?php 
namespace Dash\Controllers\Event;

class User extends BaseAuth 
{
    use \Dsc\Traits\Controllers\CrudItem;

    protected $list_route = '/';
    protected $create_item_route = '/user/create';
    protected $get_item_route = '/user/view/{id}';    
    protected $edit_item_route = '/user/edit/{id}';
    
    protected function getModel() 
    {
        $model = new \Dash\Models\Event\Users;
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
        
        $selected = array();
        $flash = \Dsc\Flash::instance();
       
        
        $flash->store( $flash->get('old') );        

        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::user/create.php');
    }
    
     protected function displayEdit()
    {
        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Edit User');
        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::user/edit.php');
    }

    //reroute this to  the \Dash\
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

    
    protected function displayRead() {

        $f3 = \Base::instance();
        $f3->set('pagetitle', 'Edit User');
        
        $view = new \Dsc\Template;
        echo $view->render('Dash/Views::user/edit.php');
    }
}