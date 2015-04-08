<?php

// src/CopyRight/AppBundle/Entity/User.php

namespace CopyRight\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @ORM\Entity(repositoryClass="CopyRight\AppBundle\Entity\Repository\UserRepository")
 * @ORM\Table(name="Users")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\OneToMany(targetEntity="Product", mappedBy="user")
     */
    protected $product;
    
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created;  
    
    
    public function __construct()
    {
        parent::__construct();
        
        $kernel = $GLOBALS['kernel'];
        $em = $kernel->getContainer();
        
        if ( $salt = $em->getParameter('secret') ) 
        {
            $this->salt = $salt;
        }
        $this->roles = array('ROLE_USER');
        
        $this->created = date("Y-m-d H:i:s");
        $this->comments = new ArrayCollection();
    }
    
//    private function getConfig($param)
//    {
//        $kernel = $GLOBALS['kernel'];
//        $em = $kernel->getContainer();
//        if ( $result = $this->container->parameters[$param] )
//        {
//            return $result;
//        }
//        else
//        {
//            return false;
//        }
//    }

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
     * Set productId
     *
     * @param integer $productId
     * @return User
     */
    public function setProductId($productId)
    {
        $this->productId = $productId;

        return $this;
    }

    /**
     * Get productId
     *
     * @return integer 
     */
    public function getProductId()
    {
        return $this->productId;
    }

    /**
     * Set created
     *
     * @param \DateTime $created
     * @return User
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get created
     *
     * @return \DateTime 
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set langId
     *
     * @param integer $langId
     * @return User
     */
    public function setLangId($langId)
    {
        $this->langId = $langId;

        return $this;
    }

    /**
     * Get langId
     *
     * @return integer 
     */
    public function getLangId()
    {
        return $this->langId;
    }
}
