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
