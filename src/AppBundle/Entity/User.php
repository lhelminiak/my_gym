<?php
// src/AppBundle/Entity/User.php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="firstName", type="string", length=100)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="lastName", type="string", length=100)
     */
    private $lastName;


    /**
     * @var string
     *
     * @ORM\Column(name="aboutMe", type="string", length=512, nullable=true)
     */
    private $aboutMe;

    /**
     * @var string
     *
     * @ORM\Column(name="imageURL", type="string", nullable=true)
     */
    private $imageURL;

    /**
     * @var int
     *
     * @ORM\Column(name="followers", type="integer")
     */
    private $followers;


    /**
     * @var int
     *
     * @ORM\Column(name="following", type="integer")
     */
    private $following;

    /**
     * @var string
     *
     * @ORM\Column(name="facebookURL", type="string", nullable=true)
     */
    private $facebookURL;

    /**
     * @var string
     *
     * @ORM\Column(name="instagramURL", type="string", nullable=true)
     */
    private $instagramURL;

    /**
     * @var string
     *
     * @ORM\Column(name="twitterURL", type="string", nullable=true)
     */
    private $twitterURL;


//    Relationships

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Post", mappedBy="user" )
     */
    private $posts;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostLike", mappedBy="user")
     */
    private $postLikes;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\PostComment", mappedBy="user")
     */
    private $postComments;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Groups", mappedBy="user")
     */
    protected $groups;

    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Gym", mappedBy="user")
     */
    private $gyms;


    /**
     * @var ArrayCollection
     *
     * @ORM\OneToMany(targetEntity="AppBundle\Entity\Record", mappedBy="user")
     */
    private $records;



    public function __construct()
    {
        parent::__construct();
        $this->posts = new ArrayCollection();
        // your own logic
    }

    /**
     * @return ArrayCollection
     */
    public function getPosts()
    {
        return $this->posts;
    }

    /**
     * @param ArrayCollection $posts
     */
    public function setPosts($posts)
    {
        $this->posts = $posts;
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
     * @return ArrayCollection
     */
    public function getPostComments()
    {
        return $this->postComments;
    }

    /**
     * @param ArrayCollection $postComments
     */
    public function setPostComments($postComments)
    {
        $this->postComments = $postComments;
    }

    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param ArrayCollection $groups
     */
    public function setGroups($groups)
    {
        $this->groups = $groups;
    }

    /**
     * @return ArrayCollection
     */
    public function getGyms()
    {
        return $this->gyms;
    }

    /**
     * @param ArrayCollection $gyms
     */
    public function setGyms($gyms)
    {
        $this->gyms = $gyms;
    }

    /**
     * @return ArrayCollection
     */
    public function getRecords()
    {
        return $this->records;
    }

    /**
     * @param ArrayCollection $records
     */
    public function setRecords($records)
    {
        $this->records = $records;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return string
     */
    public function getAboutMe()
    {
        return $this->aboutMe;
    }

    /**
     * @param string $aboutMe
     */
    public function setAboutMe($aboutMe)
    {
        $this->aboutMe = $aboutMe;
    }

    /**
     * @return string
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * @param string $imageURL
     */
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;
    }

    /**
     * @return int
     */
    public function getFollowers()
    {
        return $this->followers;
    }

    /**
     * @param int $followers
     */
    public function setFollowers($followers)
    {
        $this->followers = $followers;
    }

    /**
     * @return int
     */
    public function getFollowing()
    {
        return $this->following;
    }

    /**
     * @param int $following
     */
    public function setFollowing($following)
    {
        $this->following = $following;
    }

    /**
     * @return string
     */
    public function getFacebookURL()
    {
        return $this->facebookURL;
    }

    /**
     * @param string $facebookURL
     */
    public function setFacebookURL($facebookURL)
    {
        $this->facebookURL = $facebookURL;
    }

    /**
     * @return string
     */
    public function getInstagramURL()
    {
        return $this->instagramURL;
    }

    /**
     * @param string $instagramURL
     */
    public function setInstagramURL($instagramURL)
    {
        $this->instagramURL = $instagramURL;
    }

    /**
     * @return string
     */
    public function getTwitterURL()
    {
        return $this->twitterURL;
    }

    /**
     * @param string $twitterURL
     */
    public function setTwitterURL($twitterURL)
    {
        $this->twitterURL = $twitterURL;
    }
}