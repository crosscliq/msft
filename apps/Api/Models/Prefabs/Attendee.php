<?php 
namespace Api\Models\Prefabs;

class Attendee extends \Dsc\Prefabs
{
    protected $default_options = array(
         'append' => true // set this to true so that ->bind() adds fields to $this->document even if they aren't in the default document structure
    );

    public function __construct($source=array(), $options=array())
    {
         parent::__construct( $source, $options );
         $this->set('created', \Dsc\Mongo\Metastamp::getDate('now'));
    }
   
    /**
     * Default document structure
     * @var array
     */
    protected $document = array(
        'first_name' => '',
        'last_name' => '',
        'email' => '',
        'phone' => '',
        'zipcode' => '',
        'tagid' => '',
        'products' => array(),
        'offers' => array(),
        'created' => ''
    );


}