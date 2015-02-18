<?php

namespace World\VolunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Association
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\VolunteerBundle\Entity\AssociationRepository")
 */
class Association
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
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="address", type="text")
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="country", type="string", length=255)
     */
    private $country;

    /**
     * @var string
     *
     * @ORM\Column(name="state", type="string", length=255)
     */
    private $state;

    /**
     * @var string
     *
     * @ORM\Column(name="city", type="string", length=255)
     */
    private $city;

    /**
     * @var string
     *
     * @ORM\Column(name="phone", type="string", length=255)
     */
    private $phone;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=255)
     */
    private $email;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="founded", type="date")
     */
    private $founded;




    /**
     * @var string
     *
     * @ORM\Column(name="mission", type="text")
     */
    private $mission;

    /**
     * @var string
     *
     * @ORM\Column(name="vision", type="text")
     */
    private $vision;

    /**
     * @var string
     *
     * @ORM\Column(name="philosophy", type="text")
     */
    private $philosophy;

    /**
     * @var boolean
     *
     * @ORM\Column(name="legal", type="boolean")
     */
    private $legal;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="denomination", type="string", length=255)
     */
    private $denomination;

    /**
     * @var string
     *
     * @ORM\Column(name="coverage", type="text")
     */
    private $coverage;



    /**
     * @var string
     *
     * @ORM\Column(name="aboutUs", type="text")
     */
    private $aboutUs;

    /**
     * @var string
     *
     * @ORM\Column(name="whatWeDo", type="text")
     */
    private $whatWeDo;



    /**
     * @var string
     *
     * @ORM\Column(name="legalPartner", type="string", length=255)
     */
    private $legalPartner;

    /**
     * @var string
     *
     * @ORM\Column(name="legalPartnerPhone", type="string", length=255)
     */
    private $legalPartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="legalPartnerEmail", type="string", length=255)
     */
    private $legalPartnerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartner", type="string", length=255)
     */
    private $executivePartner;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartnerPhone", type="string", length=255)
     */
    private $executivePartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="executivePartnerEmail", type="string", length=255)
     */
    private $executivePartnerEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartner", type="string", length=255)
     */
    private $communicationPartner;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartnerPhone", type="string", length=255)
     */
    private $communicationPartnerPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="communicationPartnerEmail", type="string", length=255)
     */
    private $communicationPartnerEmail;





    /**
     * @var string
     *
     * @ORM\Column(name="website", type="string", length=255)
     */
    private $website;

    /**
     * @var string
     *
     * @ORM\Column(name="facebook", type="string", length=255)
     */
    private $facebook;

    /**
     * @var string
     *
     * @ORM\Column(name="twitter", type="string", length=255)
     */
    private $twitter;

    /**
     * @var string
     *
     * @ORM\Column(name="instagram", type="string", length=255)
     */
    private $instagram;






    /**
     * @var string
     *
     * @ORM\Column(name="director", type="string", length=255)
     */
    private $director;

    /**
     * @var string
     *
     * @ORM\Column(name="directorPhone", type="string", length=255)
     */
    private $directorPhone;

    /**
     * @var string
     *
     * @ORM\Column(name="directorEmail", type="string", length=255)
     */
    private $directorEmail;

    /**
     * @var string
     *
     * @ORM\Column(name="directorBirthdate", type="date")
     */
    private $directorBirthdate;

    /**
     * @var string
     *
     * @ORM\Column(name="directorTime", type="string", length=255)
     */
    private $directorTime;






    /**
     * @var string
     *
     * @ORM\Column(name="history", type="text")
     */
    private $history;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerRequirements", type="text")
     */
    private $volunteerRequirements;

    /**
     * @var string
     *
     * @ORM\Column(name="volunteerAge", type="text")
     */
    private $volunteerAge;

    /**
     * @var string
     *
     * @ORM\Column(name="commitment", type="text")
     */
    private $commitment;

    /**
     * @var boolean
     *
     * @ORM\Column(name="donations", type="boolean")
     */
    private $donations;

    /**
     * @var string
     *
     * @ORM\Column(name="donation_method", type="string", length=255)
     */
    private $donationMethod;

    /**
     * @var string
     *
     * @ORM\Column(name="donation_purpose", type="text")
     */
    private $donationPurpose;



    /**
     * @var string
     *
     * @ORM\Column(name="axis", type="string", length=255)
     */
    private $axis;




    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerActive", type="integer")
     */
    private $volunteerActive;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerPermanent", type="integer")
     */
    private $volunteerPermanent;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerMan", type="integer")
     */
    private $volunteerMan;

    /**
     * @var integer
     *
     * @ORM\Column(name="volunteerWoman", type="integer")
     */
    private $volunteerWoman;




    /**
     * @var string
     *
     * @ORM\Column(name="frequency", type="text")
     */
    private $frequency;







    /**
     * @var string
     *
     * @ORM\Column(name="logo", type="string", length=255)
     */
    private $logo;






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
     */
    private $user;

    /**
     * @var boolean
     *
     * @ORM\Column(name="approved", type="boolean")
     */
    private $approved;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


}
