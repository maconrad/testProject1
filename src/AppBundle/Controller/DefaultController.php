<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;
use AppBundle\Entity\Product;

class DefaultController extends Controller
{
    /**
     * @Route("/app/example", name="homepage2")
     */
    public function indexAction()
    {
        $product = new Product();
        $product->setName('A Foo Bar2');
        $product->setPrice('29.99');
        $product->setDescription('Lorem ipsum dolor');
        $em = $this->getDoctrine()->getManager();
        $em->persist($product);
        $em->flush();
        return new Response('Created product id '.$product->getId());
        
        //return $this->render('default/index.html.twig');
    }
    
    /**
     * @Route("/app/example/show/{id}", name="homepage3")
     */
    public function showAction($id)
    {
        $product = $this->getDoctrine()
        ->getRepository('AppBundle:Product')
        ->find($id);
    
        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id '.$id
            );
        }
        
        return $this->render('AppBundle::showProduct.html.twig', array('product' => $product));
        
    // ... do something, like pass the $product object into a template
    }
}
