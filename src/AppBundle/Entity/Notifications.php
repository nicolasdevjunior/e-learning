<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Notifications
 *
 * @ORM\Table(name="notifications")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\NotificationsRepository")
 */
class Notifications
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
     * @var string
     *
     * @ORM\Column(name="subject", type="string", length=255)
     */
    private $subject;

    /**
     * @var int
     *
     * @ORM\Column(name="idPub", type="integer", nullable=true)
     */
    private $idPub;

    /**
     * @var int
     *
     * @ORM\Column(name="stateNotification", type="integer")
     */
    private $stateNotification;

    /**
     * @var int
     *
     * @ORM\Column(name="sender", type="integer")
     */
    private $sender;

    /**
     * @var int
     *
     * @ORM\Column(name="recever", type="integer")
     */
    private $recever;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;


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
     * Set subject
     *
     * @param string $subject
     *
     * @return Notifications
     */
    public function setSubject($subject)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return string
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set stateNotification
     *
     * @param integer $stateNotification
     *
     * @return Notifications
     */
    public function setStateNotification($stateNotification)
    {
        $this->stateNotification = $stateNotification;

        return $this;
    }

    /**
     * Get stateNotification
     *
     * @return int
     */
    public function getStateNotification()
    {
        return $this->stateNotification;
    }

    /**
     * Set sender
     *
     * @param integer $sender
     *
     * @return Notifications
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * Get sender
     *
     * @return int
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * Set recever
     *
     * @param integer $recever
     *
     * @return Notifications
     */
    public function setRecever($recever)
    {
        $this->recever = $recever;

        return $this;
    }

    /**
     * Get recever
     *
     * @return int
     */
    public function getRecever()
    {
        return $this->recever;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Notifications
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set idPub
     *
     * @param integer $idPub
     *
     * @return Notifications
     */
    public function setIdPub($idPub)
    {
        $this->idPub = $idPub;

        return $this;
    }

    /**
     * Get idPub
     *
     * @return integer
     */
    public function getIdPub()
    {
        return $this->idPub;
    }
}
