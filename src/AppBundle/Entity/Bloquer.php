<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Bloquer
 *
 * @ORM\Table(name="bloquer")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\BloquerRepository")
 */
class Bloquer
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
     * @ORM\Column(name="idUser", type="integer")
     */
    private $idUser;

    /**
     * @var int
     *
     * @ORM\Column(name="idBloque", type="integer")
     */
    private $idBloque;

    /**
     * @var int
     *
     * @ORM\Column(name="state_request", type="integer")
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
     * Set idUser
     *
     * @param integer $idUser
     *
     * @return Bloquer
     */
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get idUser
     *
     * @return int
     */
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set idBloque
     *
     * @param integer $idBloque
     *
     * @return Bloquer
     */
    public function setIdBloque($idBloque)
    {
        $this->idBloque = $idBloque;

        return $this;
    }

    /**
     * Get idBloque
     *
     * @return int
     */
    public function getIdBloque()
    {
        return $this->idBloque;
    }

    /**
     * Set stateRequest
     *
     * @param integer $stateRequest
     *
     * @return Bloquer
     */
    public function setStateRequest($stateRequest)
    {
        $this->stateRequest = $stateRequest;

        return $this;
    }

    /**
     * Get stateRequest
     *
     * @return int
     */
    public function getStateRequest()
    {
        return $this->stateRequest;
    }
}

