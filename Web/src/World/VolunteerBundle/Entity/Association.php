<?php

namespace World\VolunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use World\ToolBundle\Entity\BaseEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

use World\ToolBundle\Utility\ImageUtils;

/**
 * Association
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\VolunteerBundle\Entity\Repositories\AssociationRepository")
 * @Gedmo\Uploadable( pathMethod="getPath", filenameGenerator="SHA1", allowOverwrite=true, appendNumber=true )
 * @UniqueEntity(fields={"name"})
 * @Gedmo\Loggable
 */
class Association extends BaseEntity
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
     * @ORM\Column(name="address", type="text")
     * @Gedmo\Versioned
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="founded", type="date")
     * @Gedmo\Versioned
     */
    private $founded;

    /**
     * @var string
     *
     * @ORM\Column(name="operationTime", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $operationTime;




    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="vision", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $vision;

    /**
     * @var string
     *
     * @ORM\Column(name="philosophy", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $philosophy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="legal", type="boolean")
     * @Gedmo\Versioned
     */
    private $legal;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="typeOther", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $typeOther;

    /**
     * @var string
     *
     * @ORM\Column(name="denomination", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $denomination;

    /**
     * @var string
     *
     * @ORM\Column(name="denominationOther", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $denominationOther;

    /**
     * @var string
     *
     * @ORM\Column(name="coverage", type="text")
     * @Gedmo\Versioned
     */
    private $coverage;



    /**
     * @var string
     *
     * @ORM\Column(name="aboutUs", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $aboutUs;

    /**
     * @var string
     *
     * @ORM\Column(name="whatWeDo", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $whatWeDo;



    /**
     * @var string
     *
     * @ORM\Column(name="legalPartner", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $legalPartner;

    /**
     * @var string
     *
     * @ORM\Column(name="legalPartnerPhone", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $legalPartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="legalPartnerEmail", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $legalPartnerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartner", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $executivePartner;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartnerPhone", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $executivePartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartnerEmail", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $executivePartnerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartner", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $communicationPartner;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartnerPhone", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $communicationPartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartnerEmail", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $communicationPartnerEmail;





    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookUrl", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $facebookUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterUrl", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $twitterUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $instagram;

    /**
     * @var string
     *
     * @ORM\Column(name="instagramUrl", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $instagramUrl;






    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="directorPhone", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $directorPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="directorEmail", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $directorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="directorBirthdate", type="date", nullable=true)
     * @Gedmo\Versioned
     */
    private $directorBirthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="directorTime", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $directorTime;






    /**
     * @var string
     *
     * @ORM\Column(name="history", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $history;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerRequirements", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerAge", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerAge;

    /**
     * @var string
     *
     * @ORM\Column(name="commitment", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $commitment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="donations", type="boolean", nullable=true)
     * @Gedmo\Versioned
     */
    private $donations;

    /**
     * @var string
     *
     * @ORM\Column(name="donationMethod", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $donationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="donationPurpose", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $donationPurpose;



    /**
     * @var string
     *
     * @ORM\Column(name="axis", type="string", length=255, nullable=true)
     * @Gedmo\Versioned
     */
    private $axis;




    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerActive", type="integer", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerPermanent", type="integer", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerPermanent;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerMan", type="integer", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerMan;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerWoman", type="integer", nullable=true)
     * @Gedmo\Versioned
     */
    private $volunteerWoman;




    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="text", nullable=true)
     * @Gedmo\Versioned
     */
    private $frequency;







    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255, nullable=true)
     * @Gedmo\UploadableFilePath
     * @Assert\File(maxSize="100M")
     */
    private $logo;

    /**
     * @var string
     *
     * @ORM\Column(name="auxLogo", type="string", length=255, nullable=true)
     */
    private $auxLogo;



    /**
     * @var Activity
     *
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="association")
     */
    protected $activities;

    /**
     * @var Testimonial
     *
     * @ORM\OneToMany(targetEntity="Testimonial", mappedBy="association")
     */
    protected $testimonials;

    /**
     * @var Photo
     *
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="association")
     */
    protected $photos;

    /**
     * @var Video
     *
     * @ORM\OneToMany(targetEntity="Video", mappedBy="association")
     */
    protected $videos;






    /**
     * @var integer
     *
     * @ORM\Column(name="random_value", type="integer", nullable=true)
     */
    private $randomValue;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="World\UserBundle\Entity\User", inversedBy="associations")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Gedmo\Versioned
     */
    protected $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean", nullable=true)
     * @Gedmo\Versioned
     */
    private $approved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="enabled", type="boolean", nullable=true)
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


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->activites = new \Doctrine\Common\Collections\ArrayCollection();
        $this->testimonials = new \Doctrine\Common\Collections\ArrayCollection();
        $this->photos = new \Doctrine\Common\Collections\ArrayCollection();
        $this->videos = new \Doctrine\Common\Collections\ArrayCollection();

        $this->enabled = true;
        $this->approved = false;
    }

    public function getImage() {
        return $this->getLogo();
    }

    protected static $IMG_PATH = "uploads/association";

    public function getImageWebPath() {
        return ImageUtils::getGenericPath( self::$IMG_PATH, '', $this->getImage() );
    }

    public function getPath() {
        return realpath('.') . '/' . self::$IMG_PATH;
    }

    public function getSlug() {
        return $this->cleanName( $this->getName() );
    }

    private function cleanName($string) {
        $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        $string = strtolower($string);

        return preg_replace('/[^A-Za-z0-9\-]/', '', $string); // Removes special chars.
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
     * @return Association
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
     * Set address
     *
     * @param string $address
     * @return Association
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string 
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set country
     *
     * @param string $country
     * @return Association
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return string 
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set state
     *
     * @param string $state
     * @return Association
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get state
     *
     * @return string 
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Association
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string 
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set phone
     *
     * @param string $phone
     * @return Association
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string 
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return Association
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set founded
     *
     * @param \DateTime $founded
     * @return Association
     */
    public function setFounded($founded)
    {
        $this->founded = $founded;

        return $this;
    }

    /**
     * Get founded
     *
     * @return \DateTime 
     */
    public function getFounded()
    {
        return $this->founded;
    }

    /**
     * Set operationTime
     *
     * @param string $operationTime
     * @return Association
     */
    public function setOperationTime($operationTime)
    {
        $this->operationTime = $operationTime;

        return $this;
    }

    /**
     * Get operationTime
     *
     * @return string 
     */
    public function getOperationTime()
    {
        return $this->operationTime;
    }

    /**
     * Set mission
     *
     * @param string $mission
     * @return Association
     */
    public function setMission($mission)
    {
        $this->mission = $mission;

        return $this;
    }

    /**
     * Get mission
     *
     * @return string 
     */
    public function getMission()
    {
        return $this->mission;
    }

    /**
     * Set vision
     *
     * @param string $vision
     * @return Association
     */
    public function setVision($vision)
    {
        $this->vision = $vision;

        return $this;
    }

    /**
     * Get vision
     *
     * @return string 
     */
    public function getVision()
    {
        return $this->vision;
    }

    /**
     * Set philosophy
     *
     * @param string $philosophy
     * @return Association
     */
    public function setPhilosophy($philosophy)
    {
        $this->philosophy = $philosophy;

        return $this;
    }

    /**
     * Get philosophy
     *
     * @return string 
     */
    public function getPhilosophy()
    {
        return $this->philosophy;
    }

    /**
     * Set legal
     *
     * @param boolean $legal
     * @return Association
     */
    public function setLegal($legal)
    {
        $this->legal = $legal;

        return $this;
    }

    /**
     * Get legal
     *
     * @return boolean 
     */
    public function getLegal()
    {
        return $this->legal;
    }

    /**
     * Set type
     *
     * @param string $type
     * @return Association
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string 
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set typeOther
     *
     * @param string $typeOther
     * @return Association
     */
    public function setTypeOther($typeOther)
    {
        $this->typeOther = $typeOther;

        return $this;
    }

    /**
     * Get typeOther
     *
     * @return string 
     */
    public function getTypeOther()
    {
        return $this->typeOther;
    }

    /**
     * Set denomination
     *
     * @param string $denomination
     * @return Association
     */
    public function setDenomination($denomination)
    {
        $this->denomination = $denomination;

        return $this;
    }

    /**
     * Get denomination
     *
     * @return string 
     */
    public function getDenomination()
    {
        return $this->denomination;
    }

    /**
     * Set denominationOther
     *
     * @param string $denominationOther
     * @return Association
     */
    public function setDenominationOther($denominationOther)
    {
        $this->denominationOther = $denominationOther;

        return $this;
    }

    /**
     * Get denominationOther
     *
     * @return string 
     */
    public function getDenominationOther()
    {
        return $this->denominationOther;
    }

    /**
     * Set coverage
     *
     * @param string $coverage
     * @return Association
     */
    public function setCoverage($coverage)
    {
        $this->coverage = $coverage;

        return $this;
    }

    /**
     * Get coverage
     *
     * @return string 
     */
    public function getCoverage()
    {
        return $this->coverage;
    }

    /**
     * Set aboutUs
     *
     * @param string $aboutUs
     * @return Association
     */
    public function setAboutUs($aboutUs)
    {
        $this->aboutUs = $aboutUs;

        return $this;
    }

    /**
     * Get aboutUs
     *
     * @return string 
     */
    public function getAboutUs()
    {
        return $this->aboutUs;
    }

    /**
     * Set whatWeDo
     *
     * @param string $whatWeDo
     * @return Association
     */
    public function setWhatWeDo($whatWeDo)
    {
        $this->whatWeDo = $whatWeDo;

        return $this;
    }

    /**
     * Get whatWeDo
     *
     * @return string 
     */
    public function getWhatWeDo()
    {
        return $this->whatWeDo;
    }

    /**
     * Set legalPartner
     *
     * @param string $legalPartner
     * @return Association
     */
    public function setLegalPartner($legalPartner)
    {
        $this->legalPartner = $legalPartner;

        return $this;
    }

    /**
     * Get legalPartner
     *
     * @return string 
     */
    public function getLegalPartner()
    {
        return $this->legalPartner;
    }

    /**
     * Set legalPartnerPhone
     *
     * @param string $legalPartnerPhone
     * @return Association
     */
    public function setLegalPartnerPhone($legalPartnerPhone)
    {
        $this->legalPartnerPhone = $legalPartnerPhone;

        return $this;
    }

    /**
     * Get legalPartnerPhone
     *
     * @return string 
     */
    public function getLegalPartnerPhone()
    {
        return $this->legalPartnerPhone;
    }

    /**
     * Set legalPartnerEmail
     *
     * @param string $legalPartnerEmail
     * @return Association
     */
    public function setLegalPartnerEmail($legalPartnerEmail)
    {
        $this->legalPartnerEmail = $legalPartnerEmail;

        return $this;
    }

    /**
     * Get legalPartnerEmail
     *
     * @return string 
     */
    public function getLegalPartnerEmail()
    {
        return $this->legalPartnerEmail;
    }

    /**
     * Set executivePartner
     *
     * @param string $executivePartner
     * @return Association
     */
    public function setExecutivePartner($executivePartner)
    {
        $this->executivePartner = $executivePartner;

        return $this;
    }

    /**
     * Get executivePartner
     *
     * @return string 
     */
    public function getExecutivePartner()
    {
        return $this->executivePartner;
    }

    /**
     * Set executivePartnerPhone
     *
     * @param string $executivePartnerPhone
     * @return Association
     */
    public function setExecutivePartnerPhone($executivePartnerPhone)
    {
        $this->executivePartnerPhone = $executivePartnerPhone;

        return $this;
    }

    /**
     * Get executivePartnerPhone
     *
     * @return string 
     */
    public function getExecutivePartnerPhone()
    {
        return $this->executivePartnerPhone;
    }

    /**
     * Set executivePartnerEmail
     *
     * @param string $executivePartnerEmail
     * @return Association
     */
    public function setExecutivePartnerEmail($executivePartnerEmail)
    {
        $this->executivePartnerEmail = $executivePartnerEmail;

        return $this;
    }

    /**
     * Get executivePartnerEmail
     *
     * @return string 
     */
    public function getExecutivePartnerEmail()
    {
        return $this->executivePartnerEmail;
    }

    /**
     * Set communicationPartner
     *
     * @param string $communicationPartner
     * @return Association
     */
    public function setCommunicationPartner($communicationPartner)
    {
        $this->communicationPartner = $communicationPartner;

        return $this;
    }

    /**
     * Get communicationPartner
     *
     * @return string 
     */
    public function getCommunicationPartner()
    {
        return $this->communicationPartner;
    }

    /**
     * Set communicationPartnerPhone
     *
     * @param string $communicationPartnerPhone
     * @return Association
     */
    public function setCommunicationPartnerPhone($communicationPartnerPhone)
    {
        $this->communicationPartnerPhone = $communicationPartnerPhone;

        return $this;
    }

    /**
     * Get communicationPartnerPhone
     *
     * @return string 
     */
    public function getCommunicationPartnerPhone()
    {
        return $this->communicationPartnerPhone;
    }

    /**
     * Set communicationPartnerEmail
     *
     * @param string $communicationPartnerEmail
     * @return Association
     */
    public function setCommunicationPartnerEmail($communicationPartnerEmail)
    {
        $this->communicationPartnerEmail = $communicationPartnerEmail;

        return $this;
    }

    /**
     * Get communicationPartnerEmail
     *
     * @return string 
     */
    public function getCommunicationPartnerEmail()
    {
        return $this->communicationPartnerEmail;
    }

    /**
     * Set website
     *
     * @param string $website
     * @return Association
     */
    public function setWebsite($website)
    {
        $this->website = $website;

        return $this;
    }

    /**
     * Get website
     *
     * @return string 
     */
    public function getWebsite()
    {
        return $this->website;
    }

    /**
     * Set facebook
     *
     * @param string $facebook
     * @return Association
     */
    public function setFacebook($facebook)
    {
        $this->facebook = $facebook;

        return $this;
    }

    /**
     * Get facebook
     *
     * @return string 
     */
    public function getFacebook()
    {
        return $this->facebook;
    }

    /**
     * Set twitter
     *
     * @param string $twitter
     * @return Association
     */
    public function setTwitter($twitter)
    {
        $this->twitter = $twitter;

        return $this;
    }

    /**
     * Get twitter
     *
     * @return string 
     */
    public function getTwitter()
    {
        return $this->twitter;
    }

    /**
     * Set instagram
     *
     * @param string $instagram
     * @return Association
     */
    public function setInstagram($instagram)
    {
        $this->instagram = $instagram;

        return $this;
    }

    /**
     * Get instagram
     *
     * @return string 
     */
    public function getInstagram()
    {
        return $this->instagram;
    }

    /**
     * Set director
     *
     * @param string $director
     * @return Association
     */
    public function setDirector($director)
    {
        $this->director = $director;

        return $this;
    }

    /**
     * Get director
     *
     * @return string 
     */
    public function getDirector()
    {
        return $this->director;
    }

    /**
     * Set directorPhone
     *
     * @param string $directorPhone
     * @return Association
     */
    public function setDirectorPhone($directorPhone)
    {
        $this->directorPhone = $directorPhone;

        return $this;
    }

    /**
     * Get directorPhone
     *
     * @return string 
     */
    public function getDirectorPhone()
    {
        return $this->directorPhone;
    }

    /**
     * Set directorEmail
     *
     * @param string $directorEmail
     * @return Association
     */
    public function setDirectorEmail($directorEmail)
    {
        $this->directorEmail = $directorEmail;

        return $this;
    }

    /**
     * Get directorEmail
     *
     * @return string 
     */
    public function getDirectorEmail()
    {
        return $this->directorEmail;
    }

    /**
     * Set directorBirthdate
     *
     * @param \DateTime $directorBirthdate
     * @return Association
     */
    public function setDirectorBirthdate($directorBirthdate)
    {
        $this->directorBirthdate = $directorBirthdate;

        return $this;
    }

    /**
     * Get directorBirthdate
     *
     * @return \DateTime 
     */
    public function getDirectorBirthdate()
    {
        return $this->directorBirthdate;
    }

    /**
     * Set directorTime
     *
     * @param string $directorTime
     * @return Association
     */
    public function setDirectorTime($directorTime)
    {
        $this->directorTime = $directorTime;

        return $this;
    }

    /**
     * Get directorTime
     *
     * @return string 
     */
    public function getDirectorTime()
    {
        return $this->directorTime;
    }

    /**
     * Set history
     *
     * @param string $history
     * @return Association
     */
    public function setHistory($history)
    {
        $this->history = $history;

        return $this;
    }

    /**
     * Get history
     *
     * @return string 
     */
    public function getHistory()
    {
        return $this->history;
    }

    /**
     * Set volunteerRequirements
     *
     * @param string $volunteerRequirements
     * @return Association
     */
    public function setVolunteerRequirements($volunteerRequirements)
    {
        $this->volunteerRequirements = $volunteerRequirements;

        return $this;
    }

    /**
     * Get volunteerRequirements
     *
     * @return string 
     */
    public function getVolunteerRequirements()
    {
        return $this->volunteerRequirements;
    }

    /**
     * Set volunteerAge
     *
     * @param string $volunteerAge
     * @return Association
     */
    public function setVolunteerAge($volunteerAge)
    {
        $this->volunteerAge = $volunteerAge;

        return $this;
    }

    /**
     * Get volunteerAge
     *
     * @return string 
     */
    public function getVolunteerAge()
    {
        return $this->volunteerAge;
    }

    /**
     * Set commitment
     *
     * @param string $commitment
     * @return Association
     */
    public function setCommitment($commitment)
    {
        $this->commitment = $commitment;

        return $this;
    }

    /**
     * Get commitment
     *
     * @return string 
     */
    public function getCommitment()
    {
        return $this->commitment;
    }

    /**
     * Set donations
     *
     * @param boolean $donations
     * @return Association
     */
    public function setDonations($donations)
    {
        $this->donations = $donations;

        return $this;
    }

    /**
     * Get donations
     *
     * @return boolean 
     */
    public function getDonations()
    {
        return $this->donations;
    }

    /**
     * Set donationMethod
     *
     * @param string $donationMethod
     * @return Association
     */
    public function setDonationMethod($donationMethod)
    {
        $this->donationMethod = $donationMethod;

        return $this;
    }

    /**
     * Get donationMethod
     *
     * @return string 
     */
    public function getDonationMethod()
    {
        return $this->donationMethod;
    }

    /**
     * Set donationPurpose
     *
     * @param string $donationPurpose
     * @return Association
     */
    public function setDonationPurpose($donationPurpose)
    {
        $this->donationPurpose = $donationPurpose;

        return $this;
    }

    /**
     * Get donationPurpose
     *
     * @return string 
     */
    public function getDonationPurpose()
    {
        return $this->donationPurpose;
    }

    /**
     * Set axis
     *
     * @param string $axis
     * @return Association
     */
    public function setAxis($axis)
    {
        $this->axis = $axis;

        return $this;
    }

    /**
     * Get axis
     *
     * @return string 
     */
    public function getAxis()
    {
        return $this->axis;
    }

    /**
     * Set volunteerActive
     *
     * @param integer $volunteerActive
     * @return Association
     */
    public function setVolunteerActive($volunteerActive)
    {
        $this->volunteerActive = $volunteerActive;

        return $this;
    }

    /**
     * Get volunteerActive
     *
     * @return integer 
     */
    public function getVolunteerActive()
    {
        return $this->volunteerActive;
    }

    /**
     * Set volunteerPermanent
     *
     * @param integer $volunteerPermanent
     * @return Association
     */
    public function setVolunteerPermanent($volunteerPermanent)
    {
        $this->volunteerPermanent = $volunteerPermanent;

        return $this;
    }

    /**
     * Get volunteerPermanent
     *
     * @return integer 
     */
    public function getVolunteerPermanent()
    {
        return $this->volunteerPermanent;
    }

    /**
     * Set volunteerMan
     *
     * @param integer $volunteerMan
     * @return Association
     */
    public function setVolunteerMan($volunteerMan)
    {
        $this->volunteerMan = $volunteerMan;

        return $this;
    }

    /**
     * Get volunteerMan
     *
     * @return integer 
     */
    public function getVolunteerMan()
    {
        return $this->volunteerMan;
    }

    /**
     * Set volunteerWoman
     *
     * @param integer $volunteerWoman
     * @return Association
     */
    public function setVolunteerWoman($volunteerWoman)
    {
        $this->volunteerWoman = $volunteerWoman;

        return $this;
    }

    /**
     * Get volunteerWoman
     *
     * @return integer 
     */
    public function getVolunteerWoman()
    {
        return $this->volunteerWoman;
    }

    /**
     * Set frequency
     *
     * @param string $frequency
     * @return Association
     */
    public function setFrequency($frequency)
    {
        $this->frequency = $frequency;

        return $this;
    }

    /**
     * Get frequency
     *
     * @return string 
     */
    public function getFrequency()
    {
        return $this->frequency;
    }

    /**
     * Set logo
     *
     * @param string $logo
     * @return Association
     */
    public function setLogo($logo)
    {
        $this->logo = $logo;

        return $this;
    }

    /**
     * Get logo
     *
     * @return string 
     */
    public function getLogo()
    {
        return $this->logo;
    }

    /**
     * Set randomValue
     *
     * @param integer $randomValue
     * @return Association
     */
    public function setRandomValue($randomValue)
    {
        $this->randomValue = $randomValue;

        return $this;
    }

    /**
     * Get randomValue
     *
     * @return integer 
     */
    public function getRandomValue()
    {
        return $this->randomValue;
    }

    /**
     * Set approved
     *
     * @param boolean $approved
     * @return Association
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }

    /**
     * Get approved
     *
     * @return boolean 
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set enabled
     *
     * @param boolean $enabled
     * @return Association
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
     * @return Association
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
     * @return Association
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
     * Add testimonials
     *
     * @param \World\VolunteerBundle\Entity\Testimonial $testimonials
     * @return Association
     */
    public function addTestimonial(\World\VolunteerBundle\Entity\Testimonial $testimonials)
    {
        $this->testimonials[] = $testimonials;

        return $this;
    }

    /**
     * Remove testimonials
     *
     * @param \World\VolunteerBundle\Entity\Testimonial $testimonials
     */
    public function removeTestimonial(\World\VolunteerBundle\Entity\Testimonial $testimonials)
    {
        $this->testimonials->removeElement($testimonials);
    }

    /**
     * Get testimonials
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTestimonials()
    {
        return $this->testimonials;
    }

    /**
     * Add photos
     *
     * @param \World\VolunteerBundle\Entity\Photo $photos
     * @return Association
     */
    public function addPhoto(\World\VolunteerBundle\Entity\Photo $photos)
    {
        $this->photos[] = $photos;

        return $this;
    }

    /**
     * Remove photos
     *
     * @param \World\VolunteerBundle\Entity\Photo $photos
     */
    public function removePhoto(\World\VolunteerBundle\Entity\Photo $photos)
    {
        $this->photos->removeElement($photos);
    }

    /**
     * Get photos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPhotos()
    {
        return $this->photos;
    }

    /**
     * Add videos
     *
     * @param \World\VolunteerBundle\Entity\Video $videos
     * @return Association
     */
    public function addVideo(\World\VolunteerBundle\Entity\Video $videos)
    {
        $this->videos[] = $videos;

        return $this;
    }

    /**
     * Remove videos
     *
     * @param \World\VolunteerBundle\Entity\Video $videos
     */
    public function removeVideo(\World\VolunteerBundle\Entity\Video $videos)
    {
        $this->videos->removeElement($videos);
    }

    /**
     * Get videos
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getVideos()
    {
        return $this->videos;
    }

    /**
     * Set createdBy
     *
     * @param \World\UserBundle\Entity\User $createdBy
     * @return Association
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
     * @return Association
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
     * Set user
     *
     * @param \World\UserBundle\Entity\User $user
     *
     * @return Association
     */
    public function setUser(\World\UserBundle\Entity\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \World\UserBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Add activity
     *
     * @param \World\VolunteerBundle\Entity\Activity $activity
     *
     * @return Association
     */
    public function addActivity(\World\VolunteerBundle\Entity\Activity $activity)
    {
        $this->activities[] = $activity;

        return $this;
    }

    /**
     * Remove activity
     *
     * @param \World\VolunteerBundle\Entity\Activity $activity
     */
    public function removeActivity(\World\VolunteerBundle\Entity\Activity $activity)
    {
        $this->activities->removeElement($activity);
    }

    /**
     * Get activities
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActivities()
    {
        return $this->activities;
    }

    /**
     * Set facebookUrl
     *
     * @param string $facebookUrl
     *
     * @return Association
     */
    public function setFacebookUrl($facebookUrl)
    {
        $this->facebookUrl = $facebookUrl;

        return $this;
    }

    /**
     * Get facebookUrl
     *
     * @return string
     */
    public function getFacebookUrl()
    {
        return $this->facebookUrl;
    }

    /**
     * Set twitterUrl
     *
     * @param string $twitterUrl
     *
     * @return Association
     */
    public function setTwitterUrl($twitterUrl)
    {
        $this->twitterUrl = $twitterUrl;

        return $this;
    }

    /**
     * Get twitterUrl
     *
     * @return string
     */
    public function getTwitterUrl()
    {
        return $this->twitterUrl;
    }

    /**
     * Set instagramUrl
     *
     * @param string $instagramUrl
     *
     * @return Association
     */
    public function setInstagramUrl($instagramUrl)
    {
        $this->instagramUrl = $instagramUrl;

        return $this;
    }

    /**
     * Get instagramUrl
     *
     * @return string
     */
    public function getInstagramUrl()
    {
        return $this->instagramUrl;
    }

    /**
     * Set auxLogo
     *
     * @param string $auxLogo
     *
     * @return Association
     */
    public function setAuxLogo($auxLogo)
    {
        $this->auxLogo = $auxLogo;

        return $this;
    }

    /**
     * Get auxLogo
     *
     * @return string
     */
    public function getAuxLogo()
    {
        return $this->auxLogo;
    }
}
