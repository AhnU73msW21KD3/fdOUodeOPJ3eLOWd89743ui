<?php

// src/CopyRight/AppBundle/Entity/Preference.php

namespace CopyRight\AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="CopyRight\AppBundle\Entity\Repository\PreferenceRepository")
 * @ORM\Table(name="Preference")
 */
class Preference
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }
}
