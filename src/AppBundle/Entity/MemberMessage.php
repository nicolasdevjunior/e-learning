<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * MemberMessage
 *
 * @ORM\Table(name="member_message")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\MemberMessageRepository")
 */
class MemberMessage
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
     * @ORM\Column(name="idSender", type="integer")
     */
    private $idSender;

    /**
     * @var int
     *
     * @ORM\Column(name="idRecever", type="integer")
     */
    private $idRecever;

    /**
     * @var int
     *
     * @ORM\Column(name="idMsg", type="integer")
     */
    private $idMsg;

    /**
     * @var int
     *
     * @ORM\Column(name="stateMessage", type="integer")
     */
    private $stateMessage;


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
     * Set idSender
     *
     * @param integer $idSender
     *
     * @return MemberMessage
     */
    public function setIdSender($idSender)
    {
        $this->idSender = $idSender;

        return $this;
    }

    /**
     * Get idSender
     *
     * @return int
     */
    public function getIdSender()
    {
        return $this->idSender;
    }

    /**
     * Set idRecever
     *
     * @param integer $idRecever
     *
     * @return MemberMessage
     */
    public function setIdRecever($idRecever)
    {
        $this->idRecever = $idRecever;

        return $this;
    }

    /**
     * Get idRecever
     *
     * @return int
     */
    public function getIdRecever()
    {
        return $this->idRecever;
    }

    

    /**
     * Set idMsg
     *
     * @param integer $idMsg
     *
     * @return MemberMessage
     */
    public function setIdMsg($idMsg)
    {
        $this->idMsg = $idMsg;

        return $this;
    }

    /**
     * Get idMsg
     *
     * @return integer
     */
    public function getIdMsg()
    {
        return $this->idMsg;
    }

    /**
     * Set stateMessage
     *
     * @param integer $stateMessage
     *
     * @return MemberMessage
     */
    public function setStateMessage($stateMessage)
    {
        $this->stateMessage = $stateMessage;

        return $this;
    }

    /**
     * Get stateMessage
     *
     * @return integer
     */
    public function getStateMessage()
    {
        return $this->stateMessage;
    }
}
