<?php

namespace World\ToolBundle\Entity;

class BaseEntity
{
   
	protected $name;
	protected $enabled;

    public function __construct() {
        $this->name = "";
        $this->enabled = true;
    }
   
    public function __toString()
    {
        return $this->name;
    }
	
	public function getEnabledStr() {
    	$enabledStr = 'True';
		
		if( !$this->enabled ) {
			$enabledStr = 'False';
		}
		
		return $enabledStr;
    }

    public function getEnabled() {
        return $this->enabled;
    }

	public function getRouteName() {
        return strtolower( substr( get_class($this), strrpos( get_class($this), "\\") + 1 ) );
    }

    public function getIconName() {
    	return "home";
    }

    public function child() {
        return null;
    }

    public static function array_orderby()
    {
        $args = func_get_args();
        $data = array_shift($args);
        foreach ($args as $n => $field) {
            if (is_string($field)) {
                $tmp = array();
                foreach ($data as $key => $row)
                    $tmp[$key] = $row[$field];
                $args[$n] = $tmp;
                }
        }
        $args[] = &$data;
        call_user_func_array('array_multisort', $args);
        return array_pop($args);
    }
	
}
