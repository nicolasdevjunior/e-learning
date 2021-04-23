<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Message
 *
 * @ORM\Table(name="message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MessageRepository")
 */
class Message
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
     * @ORM\Column(name="contentMessage", type="text")
     */
    private $contentMessage;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="createdAt", type="datetime")
     */
    private $createdAt;

    /**
     * @var int
     *
     * @ORM\Column(name="idGroupMessage", type="integer")
     */
    private $idGroupMessage;


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
     * Set contentMessage
     *
     * @param string $contentMessage
     *
     * @return Message
     */
    public function setContentMessage($contentMessage)
    {
        $this->contentMessage = $contentMessage;

        return $this;
    }

    /**
     * Get contentMessage
     *
     * @return string
     */
    public function getContentMessage()
    {
        return $this->contentMessage;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Message
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
     * Set idGroupMessage
     *
     * @param integer $idGroupMessage
     *
     * @return Message
     */
    public function setIdGroupMessage($idGroupMessage)
    {
        $this->idGroupMessage = $idGroupMessage;

        return $this;
    }

    /**
     * Get idGroupMessage
     *
     * @return int
     */
    public function getIdGroupMessage()
    {
        return $this->idGroupMessage;
    }

}
