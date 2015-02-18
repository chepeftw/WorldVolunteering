<?php

/**
 * Activity form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ActivityForm extends BaseActivityForm
{
  public function configure()
  {
	    $this->widgetSchema['description']		= new sfWidgetFormTextarea();
	    $this->widgetSchema['place']		= new sfWidgetFormTextarea();
	    
	    $year_s = date('Y');
		$year_e = date('Y') + 1;
		$years = range( $year_s, $year_e );
		$this->widgetSchema['date'] = new sfWidgetFormDate( array( 'years' => array_combine( $years, $years ) ) );
		
	  $this->widgetSchema['picture']		= new sfWidgetFormInputFile();
	  $this->validatorSchema['picture'] = new sfValidatorFile(array(
										  'required'   => true,
										  'max_size'   => 51200000,
										  'path'       => sfConfig::get('app_upload_dir').'/activity/',
										));
	    
	    $this->widgetSchema->setLabel('title', 'Titulo');
	    $this->widgetSchema->setLabel('date', 'Fecha');
	    $this->widgetSchema->setLabel('description', 'Descripcion');
	    $this->widgetSchema->setLabel('place', 'Ubicacion');
	    $this->widgetSchema->setLabel('picture', 'Imagen');

		// Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);

  }
}
