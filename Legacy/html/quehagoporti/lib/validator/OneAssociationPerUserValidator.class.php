<?php

class OneAssociationPerUserValidator extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('user_id_field', 'user_id');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'Solo se permite una asociacion por usuario.');
  }

  protected function doClean($values)
  {
    $id   = isset($values[$this->getOption('user_id_field')]) ? $values[$this->getOption('user_id_field')] : false;
	
    if ( $id )
    {
       $users = Doctrine::getTable('Association')
				->createQuery()
				->where( 'user_id = '.$id )
				->count();

	   if( $users == 0 )
		return $values;
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('user_id_field') => new sfValidatorError($this, 'invalid')));
  }
}
