<?php 
namespace Msft\Models\Prefabs;

class Activity extends \Dsc\Prefabs
{
    protected $default_options = array(
         'append' => true // set this to true so that ->bind() adds fields to $this->document even if they aren't in the default document structure
    );

    public function __construct($source=array(), $options=array())
    {   $this->document['timestamp'] =  \Dsc\Mongo\Metastamp::getDate('now'); 
        
        $this->setOptions($options);
        
        if (!empty($source))
        {
            $this->bind($source, $this->options);
        }
    }
   
    /**
     * Default document structure
     * @var array
     */
    protected $document = array(
        'type' => '', //ticket|user|attendee|prize|
        'action' => '',
        'object' => array(),
        'timestamp' => ''
    );


}