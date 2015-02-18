<?php

/**
 * library actions.
 *
 * @package    quehagoporti
 * @subpackage library
 * @author     Jose Alfredo Alvarez Aldana
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class libraryActions extends sfActions
{
  public function executeIndex(sfWebRequest $request)
  {
	$limit = 5;
	 
	// Most Recent
    $query = Doctrine_Core::getTable('Library')->createQuery('a')->where('is_active = 1')
								->orderBy('created_at ASC');
	
	// Top Rating  
    $this->libraries_top = Doctrine_Core::getTable('Library')->createQuery('a')->where('is_active = 1')
								->orderBy('rating DESC')->limit( $limit )->execute();
      
	$this->pager = new sfDoctrinePager(
	'Library',
	sfConfig::get('app_max_associations')
	);
	$this->pager->setQuery( $query );
	$this->pager->setPage($request->getParameter('pagina', 1));
	$this->pager->init();
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->library = Doctrine_Core::getTable('Library')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->library);
    
    $this->getResponse()->setTitle(sprintf('Cultura del Voluntariado, %s - GuateVoluntaria.org', $this->library->getTitle()));
    
    $this->comments = $this->library->getComments();
  }
  
  public function executeRecommend(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->library = Doctrine_Core::getTable('Library')->find(array($request->getParameter('id')));
    
    if( $this->library == null ) return;
    
    $rating = new LibraryRating();
    $rating->setIp( $request->getRemoteAddress() );
    $rating->setLibraryId( $this->library->getId() );
    $rating->save();
    
    $this->library->countVotes();
  }
  
  public function executeComment(sfWebRequest $request)
  {
    $this->setLayout(false);
    $this->library = Doctrine_Core::getTable('Library')->find(array($request->getParameter('id')));
    $com = $request->getParameter('com');
    $nam = $request->getParameter('nam');
    
    $rcf = $request->getParameter('rcf');
    $rrf = $request->getParameter('rrf');
    
    $this->error_library = 0;
    $this->error_name = 0;
    $this->error_comment = 0;
    $this->error_captcha = 0;
    
    $captcha = new sfValidatorReCaptcha(array( 'private_key' => sfConfig::get('app_recaptcha_private_key') ));
    
	$answer = $captcha->check(array(
      'privatekey' => sfConfig::get('app_recaptcha_private_key'),
      'remoteip'   => $request->getRemoteAddress(),
      'challenge'  => $rcf,
      'response'   => $rrf,
    ));
    
    if( $this->library != null && $nam != null && trim( $nam ) != '' && $com != null && trim( $com ) != '' && $answer )
    {
		$com = str_replace( ";amp", "&", $com );
		$com = str_replace( ";eq", "=", $com );
		$com = str_replace( ";ques", "?", $com );
		
		$comment = new LibraryComment();
		$comment->setName( $nam );
		$comment->setComment( $com );
		$comment->setLibraryId( $this->library->getId() );
		$comment->save();
	}
	else
	{
		if( $this->library == null )
		{
			$this->error_library = 1;
		}
		if( $nam == null || trim( $nam ) == '' )
		{
			$this->error_name = 1;
		}
		if( $com == null || trim( $com ) == '' )
		{
			$this->error_comment = 1;
		}
		if ( true !== $answer )
		{
			$this->error_captcha = 1;
		}
	}
	
    $this->comments = $this->library->getComments();
  }
}
