<?php

namespace EscaleBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request)
    {
        $location = str_replace('%20', ' ', $request->query->get('location'));

        return $this->render('EscaleBundle:Default:index.html.twig', array(
            'location' => $location
        ));
    }
}
