<?php 

class ArrayToStringValidator extends sfValidatorBase
{
	
  protected function doClean($value)
  {
    $clean = "";
    
    foreach( $value as $val )
		$clean .= $val." ";
	
	$clean = rtrim( $clean );
 
    return $clean;
  }
  
}
