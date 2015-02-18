<?php

/**
 * Video form.
 *
 * @package    quepuedohacerporti
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class VideoForm extends BaseVideoForm
{
  public function configure()
  {
	  
	    $this->widgetSchema['url']		= new sfWidgetFormTextarea( array(), array('cols' => 50, 'rows' => 3) );
	    $this->widgetSchema->setLabel('url', 'Direccion de Youtube de tu video');
	    $this->validatorSchema->setPostValidator(new YoutubeUrlValidator());
	  
	  // Following code will remove Required validators from these fields.
		unset($this->validatorSchema['created_at']);
		unset($this->validatorSchema['updated_at']);

		// Following code will remove fields from form.
		unset($this->widgetSchema['created_at']);
		unset($this->widgetSchema['updated_at']);
	  
  }
}
