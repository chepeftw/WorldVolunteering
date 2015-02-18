<?php

/**
 * ActivitySurvey form.
 *
 * @package    quehagoporti
 * @subpackage form
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ActivitySurveyForm extends BaseActivitySurveyForm
{
  public function configure()
  {
	  
	  $this->widgetSchema->setLabel('association_survey_id', 'Asociacion');
	  $this->widgetSchema->setLabel('field1', 'Construcción de viviendas/desarrollo de infraestructura local');
	  $this->widgetSchema->setLabel('field2', 'Reactivación de economía local');
	  $this->widgetSchema->setLabel('field3', 'Prevención del crimen/violencia');
	  $this->widgetSchema->setLabel('field4', 'Preservación del medio ambiente');
	  $this->widgetSchema->setLabel('field5', 'Prevención de desastres');
	  $this->widgetSchema->setLabel('field6', 'Respuesta a emergencias');
	  $this->widgetSchema->setLabel('field7', 'Participación ciudadana');
	  $this->widgetSchema->setLabel('field8', 'Formación artística o deportiva a jóvenes');
	  $this->widgetSchema->setLabel('field9', 'Formación en informática');
	  $this->widgetSchema->setLabel('field10', 'Mantenimiento de lugares históricos');
	  $this->widgetSchema->setLabel('field11', 'Salud integral y preventiva');
	  $this->widgetSchema->setLabel('field12', 'Educación integral');
	  $this->widgetSchema->setLabel('field13', 'Educación sexual y reproductiva');
	  $this->widgetSchema->setLabel('field14', 'Educación/restauración de valores');
	  $this->widgetSchema->setLabel('field16', 'Cuidado y salvamento de animales');
	  $this->widgetSchema->setLabel('field17', 'Otros (especifique)');
	  
	  $this->validatorSchema->setPostValidator(new OneAssociationPerUserSurveyValidator());	  
	  
		// Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);
		unset($this->validatorSchema['field15']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
		unset($this->widgetSchema['field15']);
  }
}
