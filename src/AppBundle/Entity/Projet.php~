<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Projet
 *
 * @ORM\Table(name="projet")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProjetRepository")
 */
class Projet
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
     * @ORM\Column(name="nom_projet", type="string", length=155)
     */
    private $nomProjet;

    /**
     * @var int
     *
     * @ORM\Column(name="fondateur", type="integer")
     */
    private $fondateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_debut", type="datetime")
     */

    private $date_debut;

    /**
     * @var string
     *
     * @ORM\Column(name="nomFondateur", type="string")
     */
    private $nomFondateur;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_limite", type="datetime")
     */
    private $dateLimite;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;

    /**
     * @var int
     *
     * @ORM\Column(name="duree", type="integer")
     */
    private $duree;


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
     * Set nomProjet
     *
     * @param string $nomProjet
     *
     * @return Projet
     */
    public function setNomProjet($nomProjet)
    {
        $this->nomProjet = $nomProjet;

        return $this;
    }

    /**
     * Get nomProjet
     *
     * @return string
     */
    public function getNomProjet()
    {
        return $this->nomProjet;
    }

    /**
     * Set dateLimite
     *
     * @param \DateTime $dateLimite
     *
     * @return Projet
     */
    public function setDateLimite($dateLimite)
    {
        $this->dateLimite = $dateLimite;

        return $this;
    }

    /**
     * Get dateLimite
     *
     * @return \DateTime
     */
    public function getDateLimite()
    {
        return $this->dateLimite;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Projet
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set dateDebut
     *
     * @param \DateTime $dateDebut
     *
     * @return Projet
     */
    public function setDateDebut($dateDebut)
    {
        $this->date_debut = $dateDebut;

        return $this;
    }

    /**
     * Get dateDebut
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set fondateur
     *
     * @param integer $fondateur
     *
     * @return Projet
     */
    public function setFondateur($fondateur)
    {
        $this->fondateur = $fondateur;

        return $this;
    }

    /**
     * Get fondateur
     *
     * @return integer
     */
    public function getFondateur()
    {
        return $this->fondateur;
    }

    /**
     * Set duree
     *
     * @param integer $duree
     *
     * @return Projet
     */
    public function setDuree($duree)
    {
        $this->duree = $duree;

        return $this;
    }

    /**
     * Get duree
     *
     * @return integer
     */
    public function getDuree()
    {
        return $this->duree;
    }

    /**
     * Set nomFondateur
     *
     * @param string $nomFondateur
     *
     * @return Projet
     */
    public function setNomFondateur($nomFondateur)
    {
        $this->nomFondateur = $nomFondateur;

        return $this;
    }

    /**
     * Get nomFondateur
     *
     * @return string
     */
    public function getNomFondateur()
    {
        return $this->nomFondateur;
    }
}
