<?php

namespace World\VolunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use World\ToolBundle\Entity\BaseEntity;
use Symfony\Component\Validator\Constraints as Assert;

use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * Association
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\VolunteerBundle\Entity\Repositories\AssociationRepository")
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
     * @ORM\Column(name="mission", type="text")
     * @Gedmo\Versioned
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="vision", type="text")
     * @Gedmo\Versioned
     */
    private $vision;

    /**
     * @var string
     *
     * @ORM\Column(name="philosophy", type="text")
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
     * @ORM\Column(name="denomination", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $denomination;

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
     * @ORM\Column(name="aboutUs", type="text")
     * @Gedmo\Versioned
     */
    private $aboutUs;

    /**
     * @var string
     *
     * @ORM\Column(name="whatWeDo", type="text")
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
     * @ORM\Column(name="website", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $instagram;






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
     * @ORM\Column(name="directorBirthdate", type="date")
     * @Gedmo\Versioned
     */
    private $directorBirthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="directorTime", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $directorTime;






    /**
     * @var string
     *
     * @ORM\Column(name="history", type="text")
     * @Gedmo\Versioned
     */
    private $history;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerRequirements", type="text")
     * @Gedmo\Versioned
     */
    private $volunteerRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerAge", type="text")
     * @Gedmo\Versioned
     */
    private $volunteerAge;

    /**
     * @var string
     *
     * @ORM\Column(name="commitment", type="text")
     * @Gedmo\Versioned
     */
    private $commitment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="donations", type="boolean")
     * @Gedmo\Versioned
     */
    private $donations;

    /**
     * @var string
     *
     * @ORM\Column(name="donationMethod", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $donationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="donationPurpose", type="text")
     * @Gedmo\Versioned
     */
    private $donationPurpose;



    /**
     * @var string
     *
     * @ORM\Column(name="axis", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $axis;




    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerActive", type="integer")
     * @Gedmo\Versioned
     */
    private $volunteerActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerPermanent", type="integer")
     * @Gedmo\Versioned
     */
    private $volunteerPermanent;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerMan", type="integer")
     * @Gedmo\Versioned
     */
    private $volunteerMan;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerWoman", type="integer")
     * @Gedmo\Versioned
     */
    private $volunteerWoman;




    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="text")
     * @Gedmo\Versioned
     */
    private $frequency;







    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $logo;



    /**
     * @var Activity
     *
     * @ORM\OneToMany(targetEntity="Activity", mappedBy="association")
     * @Gedmo\Versioned
     */
    protected $activites;

    /**
     * @var Testimonial
     *
     * @ORM\OneToMany(targetEntity="Testimonial", mappedBy="association")
     * @Gedmo\Versioned
     */
    protected $testimonials;

    /**
     * @var Photo
     *
     * @ORM\OneToMany(targetEntity="Photo", mappedBy="association")
     * @Gedmo\Versioned
     */
    protected $photos;

    /**
     * @var Video
     *
     * @ORM\OneToMany(targetEntity="Video", mappedBy="association")
     * @Gedmo\Versioned
     */
    protected $videos;






    /**
     * @var integer
     *
     * @ORM\Column(name="random_value", type="integer")
     */
    private $randomValue;

    /**
     * @var string
     *
     * @ORM\Column(name="user", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean")
     * @Gedmo\Versioned
     */
    private $approved;

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


}
