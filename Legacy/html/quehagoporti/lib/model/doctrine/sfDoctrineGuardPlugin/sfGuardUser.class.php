<?php

/**
 * sfGuardUser
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    quepuedohacerporti
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class sfGuardUser extends PluginsfGuardUser
{
	
	public function hasAssociation()
	{
		$count = Doctrine_Core::getTable('Association')
					->createQuery()
					->where( 'user_id = '.$this->getId() )
					->count();
					
		if( $count )
			return true;
		
		return false;
	}
	
}