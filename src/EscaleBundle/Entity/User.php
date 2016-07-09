<?php

namespace EscaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * User
 */
class User
{

    public function __toString()
    {
        return $this->getUserPseudo();
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
    private $userPro;

    /**
     * @var string
     */
    private $userPseudo;

    /**
     * @var string
     */
    private $userNom;

    /**
     * @var string
     */
    private $userPrenom;

    /**
     * @var string
     */
    private $userSoc;

    /**
     * @var string
     */
    private $userEmail;

    /**
     * @var string
     */
    private $userTel;

    /**
     * @var string
     */
    private $userAdr;

    /**
     * @var string
     */
    private $userAdr2;

    /**
     * @var string
     */
    private $userCp;

    /**
     * @var string
     */
    private $userVille;

    /**
     * @var string
     */
    private $userPays;

    /**
     * @var string
     */
    private $userPhoto;

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
     * Set userPro
     *
     * @param boolean $userPro
     * @return User
     */
    public function setUserPro($userPro)
    {
        $this->userPro = $userPro;

        return $this;
    }

    /**
     * Get userPro
     *
     * @return boolean 
     */
    public function getUserPro()
    {
        return $this->userPro;
    }

    /**
     * Set userPseudo
     *
     * @param string $userPseudo
     * @return User
     */
    public function setUserPseudo($userPseudo)
    {
        $this->userPseudo = $userPseudo;

        return $this;
    }

    /**
     * Get userPseudo
     *
     * @return string 
     */
    public function getUserPseudo()
    {
        return $this->userPseudo;
    }

    /**
     * Set userNom
     *
     * @param string $userNom
     * @return User
     */
    public function setUserNom($userNom)
    {
        $this->userNom = $userNom;

        return $this;
    }

    /**
     * Get userNom
     *
     * @return string 
     */
    public function getUserNom()
    {
        return $this->userNom;
    }

    /**
     * Set userPrenom
     *
     * @param string $userPrenom
     * @return User
     */
    public function setUserPrenom($userPrenom)
    {
        $this->userPrenom = $userPrenom;

        return $this;
    }

    /**
     * Get userPrenom
     *
     * @return string 
     */
    public function getUserPrenom()
    {
        return $this->userPrenom;
    }

    /**
     * Set userSoc
     *
     * @param string $userSoc
     * @return User
     */
    public function setUserSoc($userSoc)
    {
        $this->userSoc = $userSoc;

        return $this;
    }

    /**
     * Get userSoc
     *
     * @return string 
     */
    public function getUserSoc()
    {
        return $this->userSoc;
    }

    /**
     * Set userEmail
     *
     * @param string $userEmail
     * @return User
     */
    public function setUserEmail($userEmail)
    {
        $this->userEmail = $userEmail;

        return $this;
    }

    /**
     * Get userEmail
     *
     * @return string 
     */
    public function getUserEmail()
    {
        return $this->userEmail;
    }

    /**
     * Set userTel
     *
     * @param string $userTel
     * @return User
     */
    public function setUserTel($userTel)
    {
        $this->userTel = $userTel;

        return $this;
    }

    /**
     * Get userTel
     *
     * @return string 
     */
    public function getUserTel()
    {
        return $this->userTel;
    }

    /**
     * Set userAdr
     *
     * @param string $userAdr
     * @return User
     */
    public function setUserAdr($userAdr)
    {
        $this->userAdr = $userAdr;

        return $this;
    }

    /**
     * Get userAdr
     *
     * @return string 
     */
    public function getUserAdr()
    {
        return $this->userAdr;
    }

    /**
     * Set userAdr2
     *
     * @param string $userAdr2
     * @return User
     */
    public function setUserAdr2($userAdr2)
    {
        $this->userAdr2 = $userAdr2;

        return $this;
    }

    /**
     * Get userAdr2
     *
     * @return string 
     */
    public function getUserAdr2()
    {
        return $this->userAdr2;
    }

    /**
     * Set userCp
     *
     * @param string $userCp
     * @return User
     */
    public function setUserCp($userCp)
    {
        $this->userCp = $userCp;

        return $this;
    }

    /**
     * Get userCp
     *
     * @return string 
     */
    public function getUserCp()
    {
        return $this->userCp;
    }

    /**
     * Set userVille
     *
     * @param string $userVille
     * @return User
     */
    public function setUserVille($userVille)
    {
        $this->userVille = $userVille;

        return $this;
    }

    /**
     * Get userVille
     *
     * @return string 
     */
    public function getUserVille()
    {
        return $this->userVille;
    }

    /**
     * Set userPays
     *
     * @param string $userPays
     * @return User
     */
    public function setUserPays($userPays)
    {
        $this->userPays = $userPays;

        return $this;
    }

    /**
     * Get userPays
     *
     * @return string 
     */
    public function getUserPays()
    {
        return $this->userPays;
    }

    /**
     * Set userPhoto
     *
     * @param string $userPhoto
     * @return User
     */
    public function setUserPhoto($userPhoto)
    {
        $this->userPhoto = $userPhoto;

        return $this;
    }

    /**
     * Get userPhoto
     *
     * @return string 
     */
    public function getUserPhoto()
    {
        return $this->userPhoto;
    }

    /**
     * Add sports
     *
     * @param \EscaleBundle\Entity\Sport $sports
     * @return User
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
}
