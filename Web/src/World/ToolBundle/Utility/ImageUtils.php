<?php

namespace World\ToolBundle\Utility;

class ImageUtils
{
	
	/**
	 * Get generic web path
	 * 
	 * @param string $webPath
	 * @param string $prePath
	 * @param string $fullPath
	 * @return string
	 */
	public static function getGenericPath( $webPath, $prePath, $fullPath ) {
		$pos = strrpos( $fullPath, "/" );
		
		if ($pos === false) { // note: three equal signs
		    return $fullPath;
		} else {
			$name = substr( $fullPath, $pos + 1 );
			
			return $webPath . '/' . $prePath . $name;
		}	
	}

}