<?php

namespace CopyRight\AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction($name)
    {
        return $this->render('CopyRightAppBundle:Default:index.html.twig', array('name' => $name));
    }
}
