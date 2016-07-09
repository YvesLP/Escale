<?php

namespace EscaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Sport
 */
class Sport
{

    public function __toString()
    {
        return $this->getSportLib();
    }

    //
    //  CODE AUTO-GENERE
    //

    /**
     * @var integer
     */
    private $id;

    /**
     * @var boolean
     */
    private $sportEtat;

    /**
     * @var string
     */
    private $sportLib;

    /**
     * @var string
     */
    private $sportPicto;

    /**
     * @var string
     */
    private $sportPhoto;

    /**
     * @var string
     */
    private $sportSite;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $users;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $spots;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->users = new \Doctrine\Common\Collections\ArrayCollection();
        $this->spots = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set sportEtat
     *
     * @param boolean $sportEtat
     * @return Sport
     */
    public function setSportEtat($sportEtat)
    {
        $this->sportEtat = $sportEtat;

        return $this;
    }

    /**
     * Get sportEtat
     *
     * @return boolean 
     */
    public function getSportEtat()
    {
        return $this->sportEtat;
    }

    /**
     * Set sportLib
     *
     * @param string $sportLib
     * @return Sport
     */
    public function setSportLib($sportLib)
    {
        $this->sportLib = $sportLib;

        return $this;
    }

    /**
     * Get sportLib
     *
     * @return string 
     */
    public function getSportLib()
    {
        return $this->sportLib;
    }

    /**
     * Set sportPicto
     *
     * @param string $sportPicto
     * @return Sport
     */
    public function setSportPicto($sportPicto)
    {
        $this->sportPicto = $sportPicto;

        return $this;
    }

    /**
     * Get sportPicto
     *
     * @return string 
     */
    public function getSportPicto()
    {
        return $this->sportPicto;
    }

    /**
     * Set sportPhoto
     *
     * @param string $sportPhoto
     * @return Sport
     */
    public function setSportPhoto($sportPhoto)
    {
        $this->sportPhoto = $sportPhoto;

        return $this;
    }

    /**
     * Get sportPhoto
     *
     * @return string 
     */
    public function getSportPhoto()
    {
        return $this->sportPhoto;
    }

    /**
     * Set sportSite
     *
     * @param string $sportSite
     * @return Sport
     */
    public function setSportSite($sportSite)
    {
        $this->sportSite = $sportSite;

        return $this;
    }

    /**
     * Get sportSite
     *
     * @return string 
     */
    public function getSportSite()
    {
        return $this->sportSite;
    }

    /**
     * Add users
     *
     * @param \EscaleBundle\Entity\User $users
     * @return Sport
     */
    public function addUser(\EscaleBundle\Entity\User $users)
    {
        $this->users[] = $users;

        return $this;
    }

    /**
     * Remove users
     *
     * @param \EscaleBundle\Entity\User $users
     */
    public function removeUser(\EscaleBundle\Entity\User $users)
    {
        $this->users->removeElement($users);
    }

    /**
     * Get users
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getUsers()
    {
        return $this->users;
    }

    /**
     * Add spots
     *
     * @param \EscaleBundle\Entity\Spot $spots
     * @return Sport
     */
    public function addSpot(\EscaleBundle\Entity\Spot $spots)
    {
        $this->spots[] = $spots;

        return $this;
    }

    /**
     * Remove spots
     *
     * @param \EscaleBundle\Entity\Spot $spots
     */
    public function removeSpot(\EscaleBundle\Entity\Spot $spots)
    {
        $this->spots->removeElement($spots);
    }

    /**
     * Get spots
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSpots()
    {
        return $this->spots;
    }
}
