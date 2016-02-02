<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * asd
 *
 * @ORM\Table(name="asd")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\asdRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class asd
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
     * @ORM\Column(name="aaa", type="string", length=255, unique=true)
     */
    private $aaa;

    /**
     * @var string
     *
     * @ORM\Column(name="bbb", type="string", length=255, unique=true)
     */
    private $bbb;

    /**
     * @var int
     *
     * @ORM\Column(name="ccc", type="integer")
     */
    private $ccc;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="created_at", type="datetime")
     */
    private $createdAt;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    public function __construct()
    {
        $this->createdAt = new \DateTime();
        $this->updatedAt = new \DateTime("now");

    }
    /**
    * @ORM\PreUpdate
    */
    public function setUpdatedAtValue() {
        $this->setUpdatedAt(new \DateTime());
    }

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
     * Set aaa
     *
     * @param string $aaa
     *
     * @return asd
     */
    public function setAaa($aaa)
    {
        $this->aaa = $aaa;

        return $this;
    }

    /**
     * Get aaa
     *
     * @return string
     */
    public function getAaa()
    {
        return $this->aaa;
    }

    /**
     * Set bbb
     *
     * @param string $bbb
     *
     * @return asd
     */
    public function setBbb($bbb)
    {
        $this->bbb = $bbb;

        return $this;
    }

    /**
     * Get bbb
     *
     * @return string
     */
    public function getBbb()
    {
        return $this->bbb;
    }

    /**
     * Set ccc
     *
     * @param integer $ccc
     *
     * @return asd
     */
    public function setCcc($ccc)
    {
        $this->ccc = $ccc;

        return $this;
    }

    /**
     * Get ccc
     *
     * @return int
     */
    public function getCcc()
    {
        return $this->ccc;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return asd
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return asd
     */
    public function setUpdatedAt()
    {
        $this->updatedAt = new \Datetime("now");

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }
}

