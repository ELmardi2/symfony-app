<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class PagesController extends AbstractController
{
    /**
     * @Route("/pages", name="pages")
     */
    public function index()
    {
        return $this->render('pages/index.html.twig');
    }
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('pages/home.html.twig');
    }
    
}
