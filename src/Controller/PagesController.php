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
        //$rights = "All rights reserved To Elmardi YAHIA";
        return $this->render('pages/index.html.twig');
    }
    /**
     * @Route("/", name="home")
     */
    public function home(){
        return $this->render('pages/home.html.twig');
    }
    /**
     * @Route("/about", name="about_us")
     */
    public function about()
    {
        return $this->render('pages/about.html.twig');
    }
     /**
     * @Route("/contact", name="contact_us")
     */
    public function contact()
    {
        return $this->render('pages/contact.html.twig');
    }
}
