<?php

namespace Acme\DemoBundle\Controller;

#use Symfony\Component\HttpFoundation\Response;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
/**
 * Description of RandomController
 *
 * @author mconrad
 */
class RandomController extends Controller{
    //put your code here
    public function indexAction($limit)
    {
        $isnumber = is_numeric($limit);
        if (!$isnumber) {
            //HTTP 404
            throw $this->createNotFoundException('Seed must be numerical number');
            //HTTP 500 (Internal server error)
            //throw new \Exception('Something went wrong!');
        }
        
        $number = rand(1, $limit);
        //HTTP 302, redirect according to @Route name 
        //return $this->redirectToRoute('_demo');
        return $this->render(
            'AcmeDemoBundle:Random:index.html.twig',
            array('number' => $number)
        );
        
    }
}
