<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

/**
 * Description of newPHPClass
 *
 * @author mconrad
 */
class MainController extends Controller
{
    /**
     * @Route("/contact/example", name="homepage")
     */
    public function contactAction()
    {
        return $this->render('default/contact.html.twig');
    }
}