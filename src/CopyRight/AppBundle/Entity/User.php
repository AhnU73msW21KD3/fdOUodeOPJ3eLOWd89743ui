<?php

// src/CopyRight/AppBundle/User.php

namespace CopyRight\AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpKernel\Bundle\Bundle;

/**
 * @ORM\Entity
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
}