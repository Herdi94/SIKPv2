<?php

class MY_Router extends CI_Router {
  

 function __construct()
{
    parent::__construct();
}
 
    protected function _set_default_controller() {
    if (empty($this->default_controller)) {
        show_error('Unable to determine what should be displayed. A default route has not been specified in the routing file.');
    }

  
   if (!sscanf($this->default_controller, '%[^/]/%[^/]/%s', $directory, $class, $method) !== 2)
   {
     $method = 'index';
   }
   
   
    if ( ! file_exists(APPPATH.'controllers'. DIRECTORY_SEPARATOR . $directory. DIRECTORY_SEPARATOR .ucfirst($class).'.php'))
    {
    return;
    }
  
        $this->set_directory($directory);
        $this->set_class($class);
        $this->set_method($method);
        
    // Assign routed segments, index starting from 1
    $this->uri->rsegments = array(
        1 => $class,
        2 => $method
    );

    log_message('debug', 'No URI present. Default controller set.');
   }

}