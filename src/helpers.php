<?php 
if (!function_exists('inspector')) {
    
    function inspector($value = null)
    {
        return app('Inspector');
    }
}; 

if (!function_exists('li')) {
    
    function li($value = null)
    {
        $inspector = app('Inspector');
        if(isset($value))
            $inspector->info($value);
        
        return $inspector;;
    }
}; 

if (!function_exists('inspect')) {
    
    function inspect($value)
    {
        $inspector = app('Inspector');
        if(! $inspector->isOn()) return;
        foreach (func_get_args() as $value) {
            $inspector->info($value);
        }
    }
};

if (!function_exists('idd')) {
        
    function idd($value=null)
    {
        $inspector = app('Inspector');
        if(! $inspector->isOn()) return;
        foreach (func_get_args() as $value) {
            $inspector->info($value);
        }
        $inspector->dd();
    }
};


if (! function_exists('is_assoc')) {
    /**
     * determine if the array is associative
     * @param  array   $array [description]
     * @return boolean        [description]
     */
    function is_assoc(array $array)
    {
        $keys = array_keys($array);
        return array_keys($keys) !== $keys;
    }
}

if (! function_exists('getMicrotime')) {
    /**
     * Returns current microtime 
     * @return float
     */
    function getMicrotime()
    {
        list($usec, $sec) = explode(" ", microtime());
        return ((float)$usec + (float)$sec);
    }
}


if (! function_exists('formatMemSize')) {
     /**
     * Format a memory size
     * @param  [type]  $size      [description]
     * @param  integer $precision [description]
     * @return [type]             [description]
     */
   	function formatMemSize($size, $precision = 2) {
        $units = array('Bytes','kB','MB','GB','TB','PB','EB','ZB','YB');
        $step = 1024;
        $i = 0;
        while (($size / $step) > 0.9) {
            $size = $size / $step;
            $i++;
        }
        return round($size, $precision).$units[$i];
    }
}

if (! function_exists('checkSlash')) {
    /**
     * Add slash at the end if doesnt exist
     * @param  [type] $str [description]
     * @return [type]      [description]
     */
	function checkSlash($str)
	{
	    return substr($str,-1) !== '/' ? $str .'/' : $str;
	}
}

if (! function_exists('get_ancestors')) {
    function get_ancestors ($class) {
        $classes = array($class);
        while($class = get_parent_class($class)) { $classes[] = $class; }
        return $classes;
    }
}
	


