<?php

namespace World\VolunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use World\ToolBundle\Entity\BaseEntity;
use Symfony\Component\Validator\Constraints as Assert;

use World\ToolBundle\Utility\ImageUtils;

/**
 * Activity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\VolunteerBundle\Entity\Repositories\ActivityRepository")
 * @Gedmo\Uploadable( pathMethod="getPath", filenameGenerator="SHA1", allowOverwrite=true, appendNumber=true )
 * @Gedmo\Loggable
 */
class Activity extends BaseEntity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     * @Gedmo\Versioned
     */
    protected $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     * @Gedmo\Versioned
     */
    private $description;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date", type="date")
     * @Gedmo\Versioned
     */
    private $date;

    /**
     * @var string
     *
     * @ORM\Column(name="location", type="text")
     * @Gedmo\Versioned
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=255, nullable=true)
     * @Gedmo\UploadableFilePath
     * @Assert\File(maxSize="100M")
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="auxImage", type="string", length=255, nullable=true)
     */
    private $auxImage;

    /**
     * @var Association
     *
     * @ORM\ManyToOne(targetEntity="Association", inversedBy="activities")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Gedmo\Versioned
     */
    protected $association;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean")
     * @Gedmo\Versioned
     */
    protected $enabled;

    /**
     * @var datetime $created
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $created;

    /**
     * @var datetime $updated
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $updated;

    /**
     * @var User $createdBy
     *
     * @Gedmo\Blameable(on="create")
     * @ORM\ManyToOne(targetEntity="World\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="created_by", referencedColumnName="id")
     */
    private $createdBy;

    /**
     * @var User $updatedBy
     *
     * @Gedmo\Blameable(on="update")
     * @ORM\ManyToOne(targetEntity="World\UserBundle\Entity\User")
     * @ORM\JoinColumn(name="updated_by", referencedColumnName="id")
     */
    private $updatedBy;

    protected static $IMG_PATH = "uploads/activity";

    public function getImageWebPath() {
        return ImageUtils::getGenericPath( self::$IMG_PATH, '', $this->getImage() );
    }

    public function getPath() {
        return realpath('.') . '/' . self::$IMG_PATH;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->enabled = true; // Default value for column enable
    }





    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Activity
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return Activity
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set date
     *
     * @param \DateTime $date
     * @return Activity
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get date
     *
     * @return \DateTime 
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set location
     *
     * @param string $location
     * @return Activity
     */
    public function setLocation($location)
    {
        $this->location = $location;

        return $this;
    }

    /**
     * Get location
     *
     * @return string 
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return Activity
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Activity
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return boolean 
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return Activity
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set updated
     *
     * @param \DateTime $updated
     * @return Activity
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;

        return $this;
    }

    /**
     * Get updated
     *
     * @return \DateTime 
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set association
     *
     * @param \World\VolunteerBundle\Entity\Association $association
     * @return Activity
     */
    public function setAssociation(\World\VolunteerBundle\Entity\Association $association)
    {
        $this->association = $association;

        return $this;
    }

    /**
     * Get association
     *
     * @return \World\VolunteerBundle\Entity\Association 
     */
    public function getAssociation()
    {
        return $this->association;
    }

    /**
     * Set createdBy
     *
     * @param \World\UserBundle\Entity\User $createdBy
     * @return Activity
     */
    public function setCreatedBy(\World\UserBundle\Entity\User $createdBy = null)
    {
        $this->createdBy = $createdBy;

        return $this;
    }

    /**
     * Get createdBy
     *
     * @return \World\UserBundle\Entity\User 
     */
    public function getCreatedBy()
    {
        return $this->createdBy;
    }

    /**
     * Set updatedBy
     *
     * @param \World\UserBundle\Entity\User $updatedBy
     * @return Activity
     */
    public function setUpdatedBy(\World\UserBundle\Entity\User $updatedBy = null)
    {
        $this->updatedBy = $updatedBy;

        return $this;
    }

    /**
     * Get updatedBy
     *
     * @return \World\UserBundle\Entity\User 
     */
    public function getUpdatedBy()
    {
        return $this->updatedBy;
    }

    /**
     * Set auxImage
     *
     * @param string $auxImage
     *
     * @return Activity
     */
    public function setAuxImage($auxImage)
    {
        $this->auxImage = $auxImage;

        return $this;
    }

    /**
     * Get auxImage
     *
     * @return string
     */
    public function getAuxImage()
    {
        return $this->auxImage;
    }
}
