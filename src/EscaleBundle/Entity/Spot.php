<?php

namespace EscaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Spot
 */
class Spot
{

    public function __toString()
    {
        return $this->getSpotNom();
    }

    public $phPhoto;

    protected function getUploadDir()
    {
        return 'uploads/spot';
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath_Photo()
    {
        return null === $this->spotPhoto ? null : $this->getUploadDir().'/'.$this->spotPhoto;
    }
    public function getAbsolutePath_Photo()
    {
        return null === $this->spotPhoto ? null : $this->getUploadRootDir().'/'.$this->spotPhoto;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->phPhoto) {
            // do whatever you want to generate a unique name
            $this->spotPhoto = uniqid().'.'.$this->phPhoto->guessExtension();
        }
    }

    /**
     * @ORM\PrePersist
     */
    public function setCreatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PrePersist
     */
    public function setExpiresAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PreUpdate
     */
    public function setUpdatedAtValue()
    {
        // Add your code here
    }

    /**
     * @ORM\PostPersist
     */
    public function upload()
    {
        if (null !== $this->phPhoto) {
            // if there is an error when moving the file, an exception will
            // be automatically thrown by move(). This will properly prevent
            // the entity from being persisted to the database on error

            $this->phPhoto->move($this->getUploadRootDir(), $this->spotPhoto);

            unset($this->phPhoto);
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
        if ($phPhoto = $this->getAbsolutePath_Photo()) {
            unlink($phPhoto);
        }
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
    private $spotEtat;

    /**
     * @var string
     */
    private $spotNom;

    /**
     * @var string
     */
    private $spotGpsLat;

    /**
     * @var string
     */
    private $spotGpsLng;

    /**
     * @var string
     */
    private $spotAdr;

    /**
     * @var string
     */
    private $spotPhoto;

    /**
     * @var string
     */
    private $spotDesc;

    /**
     * @var string
     */
    private $spotSite;

    /**
     * @var integer
     */
    private $spotLikes;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $sports;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->sports = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set spotEtat
     *
     * @param boolean $spotEtat
     * @return Spot
     */
    public function setSpotEtat($spotEtat)
    {
        $this->spotEtat = $spotEtat;

        return $this;
    }

    /**
     * Get spotEtat
     *
     * @return boolean 
     */
    public function getSpotEtat()
    {
        return $this->spotEtat;
    }

    /**
     * Set spotNom
     *
     * @param string $spotNom
     * @return Spot
     */
    public function setSpotNom($spotNom)
    {
        $this->spotNom = $spotNom;

        return $this;
    }

    /**
     * Get spotNom
     *
     * @return string 
     */
    public function getSpotNom()
    {
        return $this->spotNom;
    }

    /**
     * Set spotGpsLat
     *
     * @param string $spotGpsLat
     * @return Spot
     */
    public function setSpotGpsLat($spotGpsLat)
    {
        $this->spotGpsLat = $spotGpsLat;

        return $this;
    }

    /**
     * Get spotGpsLat
     *
     * @return string 
     */
    public function getSpotGpsLat()
    {
        return $this->spotGpsLat;
    }

    /**
     * Set spotGpsLng
     *
     * @param string $spotGpsLng
     * @return Spot
     */
    public function setSpotGpsLng($spotGpsLng)
    {
        $this->spotGpsLng = $spotGpsLng;

        return $this;
    }

    /**
     * Get spotGpsLng
     *
     * @return string 
     */
    public function getSpotGpsLng()
    {
        return $this->spotGpsLng;
    }

    /**
     * Set spotAdr
     *
     * @param string $spotAdr
     * @return Spot
     */
    public function setSpotAdr($spotAdr)
    {
        $this->spotAdr = $spotAdr;

        return $this;
    }

    /**
     * Get spotAdr
     *
     * @return string 
     */
    public function getSpotAdr()
    {
        return $this->spotAdr;
    }

    /**
     * Set spotPhoto
     *
     * @param string $spotPhoto
     * @return Spot
     */
    public function setSpotPhoto($spotPhoto)
    {
        $this->spotPhoto = $spotPhoto;

        return $this;
    }

    /**
     * Get spotPhoto
     *
     * @return string 
     */
    public function getSpotPhoto()
    {
        return $this->spotPhoto;
    }

    /**
     * Set spotDesc
     *
     * @param string $spotDesc
     * @return Spot
     */
    public function setSpotDesc($spotDesc)
    {
        $this->spotDesc = $spotDesc;

        return $this;
    }

    /**
     * Get spotDesc
     *
     * @return string 
     */
    public function getSpotDesc()
    {
        return $this->spotDesc;
    }

    /**
     * Set spotSite
     *
     * @param string $spotSite
     * @return Spot
     */
    public function setSpotSite($spotSite)
    {
        $this->spotSite = $spotSite;

        return $this;
    }

    /**
     * Get spotSite
     *
     * @return string 
     */
    public function getSpotSite()
    {
        return $this->spotSite;
    }

    /**
     * Set spotLikes
     *
     * @param integer $spotLikes
     * @return Spot
     */
    public function setSpotLikes($spotLikes)
    {
        $this->spotLikes = $spotLikes;

        return $this;
    }

    /**
     * Get spotLikes
     *
     * @return integer 
     */
    public function getSpotLikes()
    {
        return $this->spotLikes;
    }

    /**
     * Add sports
     *
     * @param \EscaleBundle\Entity\Sport $sports
     * @return Spot
     */
    public function addSport(\EscaleBundle\Entity\Sport $sports)
    {
        $this->sports[] = $sports;

        return $this;
    }

    /**
     * Remove sports
     *
     * @param \EscaleBundle\Entity\Sport $sports
     */
    public function removeSport(\EscaleBundle\Entity\Sport $sports)
    {
        $this->sports->removeElement($sports);
    }

    /**
     * Get sports
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSports()
    {
        return $this->sports;
    }
    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $services;


    /**
     * Add services
     *
     * @param \EscaleBundle\Entity\Service $services
     * @return Spot
     */
    public function addService(\EscaleBundle\Entity\Service $services)
    {
        $this->services[] = $services;

        return $this;
    }

    /**
     * Remove services
     *
     * @param \EscaleBundle\Entity\Service $services
     */
    public function removeService(\EscaleBundle\Entity\Service $services)
    {
        $this->services->removeElement($services);
    }

    /**
     * Get services
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getServices()
    {
        return $this->services;
    }
}
