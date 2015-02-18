<?php

/**
 * Photo
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    quepuedohacerporti
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Photo extends BasePhoto
{
	public function getNameSlug()
	{
	  $association = Doctrine::getTable('Association')->find( $this->getAssociationId() );
	  
	  return RouteTools::slugify($association->getName());
	}
	
	public function orderPhotos()
	{
		$photos = Doctrine::getTable('Photo')
							->createQuery()
							->where('association_id = '.$this->getAssociationId())
							->orderBy('id ASC')
							->execute();

		$i = 1;
		foreach( $photos as $photo )
		{
			if( $photo->getOrderNumber() != $i )
			{
				$photo->setOrderNumber( $i );
				$photo->save();
			}
			$i++;
		}
	}
	
	public function save(Doctrine_Connection $conn = null)
	{	 
	  $conn = $conn ? $conn : $this->getTable()->getConnection();
	  $conn->beginTransaction();
	  try
	  {
		$ret = parent::save($conn);
	 
		$dir = '/var/chroot/home/content/32/7923232/html/uploads';
		
		if( file_exists( $dir . '/photos/'.$this->getLocation() ) )
		{
		// Normal Image
		$image = new SimpleImage();
		$image->load( $dir . '/photos/'.$this->getLocation() );

		$dimension = $image->getHeight();
		if( $image->getWidth() > $image->getHeight() )
			$dimension = $image->getWidth();
		
		if( $image->getHeight() > 0 && $image->getWidth() > 0 && ( $image->getHeight() > 620 || $image->getWidth() > 620 ) )
		{
			$image->scale( ( ( 620 / $dimension ) * 100 ) );
			$image->save( $dir . '/photos/'.$this->getLocation() );
		}
		// End Normal Image
		
		// Thumbnail Image
		$thumbnail = new SimpleImage();
		$thumbnail->load( $dir . '/photos/'.$this->getLocation() );
		
		$dimension = $thumbnail->getHeight();
		if( $thumbnail->getWidth() > $thumbnail->getHeight() )
			$dimension = $thumbnail->getWidth();
		
		if( $thumbnail->getHeight() > 0 && $thumbnail->getWidth() > 0 && ( $thumbnail->getHeight() > 100 || $thumbnail->getWidth() > 100 ) )
		{
			$thumbnail->scale( ( ( 100 / $dimension ) * 100 ) );
			$thumbnail->save( $dir.'/photos_thumbnail/'.$this->getLocation() );
		}
		// End Thumbnail Image
		}
		$this->orderPhotos();
	 
		$conn->commit();
	 
		return $ret;
	  }
	  catch (Exception $e)
	  {
		$conn->rollBack();
		throw $e;
	  }
	}
	
	public function delete(Doctrine_Connection $conn = null)
	{
	  $obj = parent::delete($conn);
	  $this->orderPhotos();
	  return $obj;
	}
	
}