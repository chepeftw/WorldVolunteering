<?php

/**
 * recruitComment actions.
 *
 * @package    recruitment
 * @subpackage recruitComment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class homeComponents extends sfComponents
{
  public function executeNews()
  {
    $this->news = Doctrine::getTable('News')
						->createQuery()
						->where('is_active = 1')
						->execute();
    
    if( count( $this->news ) == 0 ) return;
  }
}
