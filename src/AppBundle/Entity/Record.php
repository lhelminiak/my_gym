<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Record
 *
 * @ORM\Table(name="record")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\RecordRepository")
 */
class Record
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var int
     *
     * @ORM\Column(name="weight", type="integer")
     */
    private $weight;

    /**
     * @var int
     *
     * @ORM\Column(name="reps", type="integer", length=255)
     */
    private $reps;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;




//    Relationships

    /**
     * @var Post
     *
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\Post", inversedBy="record")
     */
    private $post;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="records")
     */
    private $user;


    /**
     * @var Lift
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Lift", inversedBy="record")
     */
    private $lift;



    // Constructor

    public function __construct(User $user, $weight, $reps, $lift, $post){
        $this->dateCreated = new \DateTime();
        $this->user = $user;
        $this->weight = $weight;
        $this->reps = $reps;
        $this->post = $post;
        $this->lift = $lift;

    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return Record
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set reps
     *
     * @param integer $reps
     *
     * @return Record
     */
    public function setReps($reps)
    {
        $this->reps = $reps;

        return $this;
    }

    /**
     * Get reps
     *
     * @return int
     */
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * @return User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
    }

    /**
     * @param \DateTime $dateCreated
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;
    }

    /**
     * @return Post
     */
    public function getPost()
    {
        return $this->post;
    }

    /**
     * @param Post $post
     */
    public function setPost($post)
    {
        $this->post = $post;
    }

    /**
     * @return Lift
     */
    public function getLift()
    {
        return $this->lift;
    }

    /**
     * @param Lift $lift
     */
    public function setLift($lift)
    {
        $this->lift = $lift;
    }
}

