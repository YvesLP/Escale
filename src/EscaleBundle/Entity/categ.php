<?php

namespace EscaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categ
 */
class categ
{

    public function __toString()
    {
        return $this->getCatLib();
    }

    public $phPicto;

    protected function getUploadDir()
    {
        return 'uploads/picto_categ';
    }
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../web/'.$this->getUploadDir();
    }

    public function getWebPath_Picto()
    {
        return null === $this->catPicto ? null : $this->getUploadDir().'/'.$this->catPicto;
    }
    public function getAbsolutePath_Picto()
    {
        return null === $this->catPicto ? null : $this->getUploadRootDir().'/'.$this->catPicto;
    }

    /**
     * @ORM\PrePersist
     */
    public function preUpload()
    {
        if (null !== $this->phPicto) {
            $this->catPicto = 'Picto_'.uniqid().'.'.$this->phPicto->guessExtension();
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
        if (null !== $this->phPicto) {
            $this->phPicto->move($this->getUploadRootDir(), $this->catPicto);
            unset($this->phPicto);
        }
    }

    /**
     * @ORM\PostRemove
     */
    public function removeUpload()
    {
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
     * @var string
     */
    private $catLib;

    /**
     * @var string
     */
    private $catPicto;


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
     * Set catLib
     *
     * @param string $catLib
     * @return categ
     */
    public function setCatLib($catLib)
    {
        $this->catLib = $catLib;

        return $this;
    }

    /**
     * Get catLib
     *
     * @return string 
     */
    public function getCatLib()
    {
        return $this->catLib;
    }

    /**
     * Set catPicto
     *
     * @param string $catPicto
     * @return categ
     */
    public function setCatPicto($catPicto)
    {
        $this->catPicto = $catPicto;

        return $this;
    }

    /**
     * Get catPicto
     *
     * @return string 
     */
    public function getCatPicto()
    {
        return $this->catPicto;
    }

}
