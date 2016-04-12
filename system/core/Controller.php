<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		CodeIgniter
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2011, EllisLab, Inc.
 * @license		http://codeigniter.com/user_guide/license.html
 * @link		http://codeigniter.com
 * @since		Version 1.0
 * @filesource
 */

// ------------------------------------------------------------------------

/**
 * CodeIgniter Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		ExpressionEngine Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	private static $instance;
    private $_license;
    private $_service;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		self::$instance =& $this;
		
		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');

		$this->load->_base_classes =& is_loaded();

		$this->load->_ci_autoloader();

		log_message('debug', "Controller Class Initialized");
    
        
      
   
	}

	public static function &get_instance()
	{
		return self::$instance;
	}
    
    
    /**
     * CI_Controller::validate_license()
     * 
     * @param string $key
     * @return void
     */
    public function validate_license(){
       $domain=$_SERVER['SERVER_NAME'];
       $url=$this->_service.'?domain='.$domain.'&license='.$this->_license;
       if(@file_get_contents($url)){
           $dom=new DOMDocument();
           $dom->load($url);
           $domains=$dom->getElementsByTagName('domain');
           foreach($domains as $domain){
            $validates=$domain->getElementsByTagName('validate');
            $validate_status=$validates->item(0)->nodeValue;
            echo $validate_status;
            $redirects=$domain->getElementsByTagName('redirect');
            $redirect_url=$redirects->item(0)->nodeValue;
            if($validate_status=='no'){
                header('location:'.$redirect_url);
            }
           }
       }
       
    }
    
    /**
     * CI_Controller::set_license_key()
     * 
     * @param mixed $key
     * @return void
     */
    public function set_license_key($key){
        $this->_license=$key;
    }
    
    /**
     * CI_Controller::set_service()
     * 
     * @param mixed $url
     * @return void
     */
    public function set_service($url){
        $this->_service=$url;
    }
    
}
// END Controller class

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */