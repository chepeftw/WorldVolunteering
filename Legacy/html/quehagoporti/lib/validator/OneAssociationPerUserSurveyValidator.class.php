<?php

class OneAssociationPerUserSurveyValidator extends sfValidatorBase
{
  public function configure($options = array(), $messages = array())
  {
    $this->addOption('volunteer_survey_id_field', 'volunteer_survey_id');
    $this->addOption('association_survey_id_field', 'association_survey_id');
    $this->addOption('throw_global_error', false);

    $this->setMessage('invalid', 'Solo se permite una vez la misma asociacion por usuario.');
  }

  protected function doClean($values)
  {
    $vs_id   = isset($values[$this->getOption('volunteer_survey_id_field')]) ? $values[$this->getOption('volunteer_survey_id_field')] : false;
    $as_id   = isset($values[$this->getOption('association_survey_id_field')]) ? $values[$this->getOption('association_survey_id_field')] : false;
	
    if ( $vs_id && $as_id )
    {
       $activities = Doctrine::getTable('ActivitySurvey')
					->createQuery()
					->where( 'volunteer_survey_id = '.$vs_id.' AND association_survey_id = '.$as_id )
					->count();

	   if( $activities == 0 )
		return $values;
    }

    if ($this->getOption('throw_global_error'))
    {
      throw new sfValidatorError($this, 'invalid');
    }

    throw new sfValidatorErrorSchema($this, array($this->getOption('association_survey_id_field') => new sfValidatorError($this, 'invalid')));
  }
}
