<?php

/**
 * Association filter form.
 *
 * @package    quepuedohacerporti
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationFormFilter extends BaseAssociationFormFilter
{
  public function configure()
  {
	  
	  unset($this->widgetSchema['address']);
	  unset($this->widgetSchema['logo']);
	  unset($this->widgetSchema['about_us']);
	  unset($this->widgetSchema['what_we_do']);
	  unset($this->widgetSchema['history']);
	  unset($this->widgetSchema['mision']);
	  unset($this->widgetSchema['vision']);
	  unset($this->widgetSchema['requirements']);
	  unset($this->widgetSchema['commitment']);
	  unset($this->widgetSchema['method']);
	  unset($this->widgetSchema['utilization']);
	  unset($this->widgetSchema['facebook_page']);
	  unset($this->widgetSchema['facebook_group']);
	  unset($this->widgetSchema['twitter_user']);
	  unset($this->widgetSchema['random_value']);
	  unset($this->widgetSchema['partner1_name']);
	  unset($this->widgetSchema['partner1_email']);
	  unset($this->widgetSchema['partner1_mobile']);
	  unset($this->widgetSchema['partner2_name']);
	  unset($this->widgetSchema['partner2_email']);
	  unset($this->widgetSchema['partner2_mobile']);
	  
  }
}
