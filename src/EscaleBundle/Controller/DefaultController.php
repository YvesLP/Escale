<?php

namespace EscaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('EscaleBundle:Default:index.html.twig');
    }
}
