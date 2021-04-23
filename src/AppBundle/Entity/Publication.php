<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Publication
 *
 * @ORM\Table(name="publication")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PublicationRepository")
 */

class Publication
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
     * @ORM\Column(name="idUserProrietaire", type="integer")
     */
    private $idUserProrietaire;

    /**
     * @var string
     *
     * @ORM\Column(name="content", type="text")
     */
    private $content;

    /**
     * @var int
     *
     * @ORM\Column(name="jaime", type="integer")
     */
    private $jaime;

    /**
     * @var int
     *
     * @ORM\Column(name="commentaires", type="integer")
     */
    private $commentaires;

     /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $created_at;
    
  
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
     * @return Publication
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
     * Set content
     *
     * @param string $content
     *
     * @return Publication
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
     * Set jaime
     *
     * @param integer $jaime
     *
     * @return Publication
     */
    public function setJaime($jaime)
    {
        $this->jaime = $jaime;

        return $this;
    }

    /**
     * Get jaime
     *
     * @return int
     */
    public function getJaime()
    {
        return $this->jaime;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Publication
     */
    public function setCreated_at($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreated_at()
    {
        return $this->created_at;
    }

   


    /**
     * Set commentaires
     *
     * @param integer $commentaires
     *
     * @return Publication
     */
    public function setCommentaires($commentaires)
    {
        $this->commentaires += $commentaires;

        return $this;
    }

    /**
     * Get commentaires
     *
     * @return integer
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }



    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Publication
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set idUserProrietaire
     *
     * @param integer $idUserProrietaire
     *
     * @return Publication
     */
    public function setIdUserProrietaire($idUserProrietaire)
    {
        $this->idUserProrietaire = $idUserProrietaire;

        return $this;
    }

    /**
     * Get idUserProrietaire
     *
     * @return integer
     */
    public function getIdUserProrietaire()
    {
        return $this->idUserProrietaire;
    }
}
