<?php 
namespace Dash\Site\Models;

//Sets some company specific states automatically
class Company extends \Dash\Site\Models\Base   
{
    protected $db = null; // the db connection object
    
    public function getDb()
    {
        if (empty($this->db))
        {
            $db_name = \Base::instance()->get('db.mongo.name');
            $this->db = new \DB\Mongo('mongodb://127.0.0.1:27017', $db_name);
        }
    
        return $this->db;
    }


    public function populateState()
    {   
        $customer = \Dsc\System::instance()->get( 'session' )->get( 'customer');
        
        $this->setCondition('company.id',  $customer->id);

        return  parent::populateState();
        
    }

    protected function beforeSave()
    {   

        if(empty($this->company_id)) {
            $customer =  \Dsc\System::instance()->get( 'session' )->get( 'customer');
            $this->company = array('id'=> $customer->id, 'name' => $customer->name);
            \Dsc\System::instance()->get( 'session' )->set( 'customer', $customer );
        }
        
        return parent::beforeSave();
    }
    
}
?>