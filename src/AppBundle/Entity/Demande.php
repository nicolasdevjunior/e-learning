<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Demande
 *
 * @ORM\Table(name="demande")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\DemandeRepository")
 */
class Demande
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
     * @ORM\Column(name="idUserRecever", type="integer")
     */
    private $idUserRecever;

    /**
     * @var int
     *
     * @ORM\Column(name="idUserSender", type="integer")
     */
    private $idUserSender;

    /**
     * @var int
     *
     * @ORM\Column(name="stateRequest", type="integer")
     */
    private $stateRequest;


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
     * Set idUserRecever
     *
     * @param integer $idUserRecever
     *
     * @return Demande
     */
    public function setIdUserRecever($idUserRecever)
    {
        $this->idUserRecever = $idUserRecever;

        return $this;
    }

    /**
     * Get idUserRecever
     *
     * @return integer
     */
    public function getIdUserRecever()
    {
        return $this->idUserRecever;
    }

    /**
     * Set idUserSender
     *
     * @param integer $idUserSender
     *
     * @return Demande
     */
    public function setIdUserSender($idUserSender)
    {
        $this->idUserSender = $idUserSender;

        return $this;
    }

    /**
     * Get idUserSender
     *
     * @return integer
     */
    public function getIdUserSender()
    {
        return $this->idUserSender;
    }

    /**
     * Set stateRequest
     *
     * @param integer $stateRequest
     *
     * @return Demande
     */
    public function setStateRequest($stateRequest)
    {
        $this->stateRequest = $stateRequest;

        return $this;
    }

    /**
     * Get stateRequest
     *
     * @return integer
     */
    public function getStateRequest()
    {
        return $this->stateRequest;
    }
}
