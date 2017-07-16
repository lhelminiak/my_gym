<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Post
 *
 * @ORM\Table(name="post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PostRepository")
 */
class Post
{
    public static $POST_REGULAR_TYPE = 0;
    public static $POST_RECORD_TYPE = 1;
    public static $POST_LIFT_REQUEST_TYPE = 2;

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="string", length=1024, nullable=true)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="type", type="integer")
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="image_url", type="string", length=512, nullable=true)
     */
    private $imageUrl;

    /**
     * @var string
     *
     * @ORM\Column(name="video_url", type="string", length=512, nullable=true)
     */
    private $videoUrl;


    /**
     * @var \DateTime
     *
     * @ORM\Column(name="liftTime", type="datetime", nullable=true)
     */
    private $liftTime;

    /**
     * @var int
     *
     *
     * @ORM\Column(name="weight", type="integer", nullable=true)
     */
    private $weight;


    /**
     * @var int
     *
     * @ORM\Column(name="reps", type="integer", nullable=true)
     */
    private $reps;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;


    /* --- ManyToOne SQL Relationships --- */

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\User", inversedBy="posts")
     */
    private $user;


    /**
     * @var PostLike
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostLike", mappedBy="post")
     */
    private $postLikes;


    /**
     * @var PostComment
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostComment", mappedBy="post")
     */
    private $postComments;

    /**
     * @var Groups
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Groups", inversedBy="posts")
     */
    private $groups;


    /**
     * @var Location
     *
     * @ORM\ManyToOne(targetEntity="AppBundle\Entity\Location", inversedBy="posts")
     */
    private $location;

    public function __construct(User $user, $content = "", $type) {
        $this->dateCreated = new \DateTime();
        $this->user = $user;
        $this->content = $content;
        $this->type = $type;
        


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
     * Set content
     *
     * @param string $content
     *
     * @return Post
     */
    public function setContent($content)
    {
        $this->content = $content;

        return $this;
    }

    /**
     * Get content
     *
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * Set type
     *
     * @param integer $type
     *
     * @return Post
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return int
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set imageUrl
     *
     * @param string $imageUrl
     *
     * @return Post
     */
    public function setImageUrl($imageUrl)
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    /**
     * Get imageUrl
     *
     * @return string
     */
    public function getImageUrl()
    {
        return $this->imageUrl;
    }

    /**
     * Set videoUrl
     *
     * @param string $videoUrl
     *
     * @return Post
     */
    public function setVideoUrl($videoUrl)
    {
        $this->videoUrl = $videoUrl;

        return $this;
    }

    /**
     * Get videoUrl
     *
     * @return string
     */
    public function getVideoUrl()
    {
        return $this->videoUrl;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return Post
     */
    public function setDateCreated($dateCreated)
    {
        $this->dateCreated = $dateCreated;

        return $this;
    }

    /**
     * Get dateCreated
     *
     * @return \DateTime
     */
    public function getDateCreated()
    {
        return $this->dateCreated;
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
     * @return ArrayCollection
     */
    public function getPostLikes()
    {
        return $this->postLikes;
    }

    /**
     * @param ArrayCollection $postLikes
     */
    public function setPostLikes($postLikes)
    {
        $this->postLikes = $postLikes;
    }

    /**
     * @return PostComment
     */
    public function getPostComments()
    {
        return $this->postComments;
    }

    /**
     * @param PostComment $postComments
     */
    public function setPostComments($postComments)
    {
        $this->postComments = $postComments;
    }

    /**
     * @return Groups
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param Groups $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return Location
     */
    public function getLocation()
    {
        return $this->location;
    }

    /**
     * @param Location $location
     */
    public function setLocation($location)
    {
        $this->location = $location;
    }

    /**
     * @return \DateTime
     */
    public function getLiftTime()
    {
        return $this->liftTime;
    }

    /**
     * @param \DateTime $liftTime
     */
    public function setLiftTime($liftTime)
    {
        $this->liftTime = $liftTime;
    }

    /**
     * @return int
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param int $weight
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    /**
     * @return int
     */
    public function getReps()
    {
        return $this->reps;
    }

    /**
     * @param int $reps
     */
    public function setReps($reps)
    {
        $this->reps = $reps;
    }
}



