<?php

namespace World\VolunteerBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use World\ToolBundle\Entity\BaseEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Activity
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="World\VolunteerBundle\Entity\Repositories\ActivityRepository")
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
     * @ORM\Column(name="description", type="text")
     * @Gedmo\Versioned
     */
    private $location;

    /**
     * @var string
     *
     * @ORM\Column(name="picture", type="string", length=255)
     * @Gedmo\Versioned
     */
    private $picture;


    /**
     * @var Association
     *
     * @ORM\ManyToOne(targetEntity="Association", inversedBy="activities")
     * @ORM\JoinColumn(nullable=false, onDelete="CASCADE")
     * @Gedmo\Versioned
     */
    protected $association;


}