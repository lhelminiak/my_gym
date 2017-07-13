<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PartnerRequestPost
 *
 * @ORM\Table(name="partner_request_post")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PartnerRequestPostRepository")
 */
class PartnerRequestPost
{
    private $REQUEST_NOT_FILLED = 0;
    private $REQUEST_ACCEPTED = 1;

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
     * @ORM\Column(name="content", type="string", length=1024)
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="status", type="integer")
     */
    private $status;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="liftTime", type="datetime")
     */
    private $liftTime;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="dateCreated", type="datetime")
     */
    private $dateCreated;


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
     * @return PartnerRequestPost
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
     * Set status
     *
     * @param integer $status
     *
     * @return PartnerRequestPost
     */
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get status
     *
     * @return int
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set liftTime
     *
     * @param \DateTime $liftTime
     *
     * @return PartnerRequestPost
     */
    public function setLiftTime($liftTime)
    {
        $this->liftTime = $liftTime;

        return $this;
    }

    /**
     * Get liftTime
     *
     * @return \DateTime
     */
    public function getLiftTime()
    {
        return $this->liftTime;
    }

    /**
     * Set dateCreated
     *
     * @param \DateTime $dateCreated
     *
     * @return PartnerRequestPost
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
}

