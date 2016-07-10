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

    public $phPhoto;
    public $phPicto;

    protected function getUploadDir()
    {
        return 'uploads/picto_sport';
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath_Photo()
    {
        return null === $this->sportPhoto ? null : $this->getUploadDir().'/'.$this->sportPhoto;
    }
    public function getAbsolutePath_Photo()
    {
        return null === $this->sportPhoto ? null : $this->getUploadRootDir().'/'.$this->sportPhoto;
    }

    public function getWebPath_Picto()
    {
        return null === $this->sportPicto ? null : $this->getUploadDir().'/'.$this->sportPicto;
    }
    public function getAbsolutePath_Picto()
    {
        return null === $this->sportPicto ? null : $this->getUploadRootDir().'/'.$this->sportPicto;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->phPhoto) {
            // do whatever you want to generate a unique name
            $this->sportPhoto = 'Ph_'.uniqid().'.'.$this->phPhoto->guessExtension();
        }

        if (null !== $this->phPicto) {
            $this->sportPicto = 'Picto_'.uniqid().'.'.$this->phPicto->guessExtension();
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

            $this->phPhoto->move($this->getUploadRootDir(), $this->sportPhoto);

            unset($this->phPhoto);
        }

        if (null !== $this->phPicto) {
            $this->phPicto->move($this->getUploadRootDir(), $this->sportPicto);
            unset($this->phPicto);
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

        if ($phPicto = $this->getAbsolutePath_Picto()) {
            unlink($phPicto);
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
