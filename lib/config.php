<?php

class config implements ArrayAccess {
	
	// Property to hold values
	private $params = Array();
	
	// constructor method
	function __construct($filename){
		if (file_exists($filename)){
			$this->readConfig($filename);
		}
	}
	
	// methods for the ArrayAccess interface
	function offsetExists($key) {
        return array_key_exists($key,$this->params);
    }
     function offsetGet($key) {
        return $this->params[$key];
    }
     function offsetSet($key, $val) {
        $this->params[$key]=$val;
    }
     function offsetUnset($key) {
        $this->params[$key]="";
    }
	
	// Description : Reads the contents of a config file into an associative
	//               array for easy access afterwards
	// Arguments   : filename - the file containing the data, in x=y format
	// Returns     : void
	// Last Change : JB, 26/3/2007
	function readConfig($filename){
		
		if (file_exists($filename)){
			
			// read the file into memory
			$file_data = file_get_contents($filename);
			
			// split on carriage returns
			$file_data = str_replace("\r\n","\n",$file_data);
			$file_array = explode("\n",$file_data);
			
			// loop through the result and build into an associative array
			for ($i=0;$i<=count($file_array);$i++){
				if ( strpos($file_array[$i],"=")>0 && strpos($file_array[$i],"=")<strlen($file_array[$i])){
					$file_line = explode("=",$file_array[$i]);
					$this->params[$file_line[0]]=$file_line[1];
				}
			}
			
		}
	}
	
	
}

?>