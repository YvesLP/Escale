<?php

namespace EscaleBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Visite
 */
class Visite
{
    
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $visitStart;

    /**
     * @var \DateTime
     */
    private $visitEnd;

    /**
     * @var \EscaleBundle\Entity\User
     */
    private $visitIduser;

    /**
     * @var \EscaleBundle\Entity\Spot
     */
    private $visitIdspot;


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
     * Set visitStart
     *
     * @param \DateTime $visitStart
     * @return Visite
     */
    public function setVisitStart($visitStart)
    {
        $this->visitStart = $visitStart;

        return $this;
    }

    /**
     * Get visitStart
     *
     * @return \DateTime 
     */
    public function getVisitStart()
    {
        return $this->visitStart;
    }

    /**
     * Set visitEnd
     *
     * @param \DateTime $visitEnd
     * @return Visite
     */
    public function setVisitEnd($visitEnd)
    {
        $this->visitEnd = $visitEnd;

        return $this;
    }

    /**
     * Get visitEnd
     *
     * @return \DateTime 
     */
    public function getVisitEnd()
    {
        return $this->visitEnd;
    }

    /**
     * Set visitIduser
     *
     * @param \EscaleBundle\Entity\User $visitIduser
     * @return Visite
     */
    public function setVisitIduser(\EscaleBundle\Entity\User $visitIduser = null)
    {
        $this->visitIduser = $visitIduser;

        return $this;
    }

    /**
     * Get visitIduser
     *
     * @return \EscaleBundle\Entity\User 
     */
    public function getVisitIduser()
    {
        return $this->visitIduser;
    }

    /**
     * Set visitIdspot
     *
     * @param \EscaleBundle\Entity\Spot $visitIdspot
     * @return Visite
     */
    public function setVisitIdspot(\EscaleBundle\Entity\Spot $visitIdspot = null)
    {
        $this->visitIdspot = $visitIdspot;

        return $this;
    }

    /**
     * Get visitIdspot
     *
     * @return \EscaleBundle\Entity\Spot 
     */
    public function getVisitIdspot()
    {
        return $this->visitIdspot;
    }
}
