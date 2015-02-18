<?php

class YoutubeUrlValidator extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('url_field', 'url');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'Esta es una url incorrecta.');
  }

  protected function doClean($values)
  {
    $url   = isset($values[$this->getOption('url_field')]) ? $values[$this->getOption('url_field')] : false;
    
    if( $url )
	{
		if ( preg_match( '%(?:youtube\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $url, $match ) )
		{
			$values[$this->getOption('url_field')] = $match[1];
		}
		
		return $values;
	}

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('user_id_field') => new sfValidatorError($this, 'invalid')));
  }
}
