<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// Include the autoloader
require_once APPPATH . 'third_party/wurfl_client/src/autoload.php';
		
		
class Wurflutils {
	
	private $client;
	
	
	public function __construct() {
    	// Create a configuration object 
		$config = new ScientiaMobile\WurflCloud\Config();
		
		// Set your WURFL Cloud API Key 
		$config->api_key = '934310:lpyg6hmifLtIrzZCEM1VTR90B7qsG5vj';
		 
		// Create the WURFL Cloud Client 
		$this->client = new ScientiaMobile\WurflCloud\Client($config);
	}
	
	
	public function is_mobile() {
		// Detect your device 
		$this->client->detectDevice();
		 
		// Use the capabilities 
		return $this->client->getDeviceCapability('is_mobile');
	}
	
	
    public function get_brandname() {
		// Detect your device 
		$this->client->detectDevice();
		
		return $this->client->getDeviceCapability('brand_name');
    }
	
	
    public function get_modelname() {
		// Detect your device 
		$this->client->detectDevice();
		
		return $this->client->getDeviceCapability('model_name');
    }
	
}