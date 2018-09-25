<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;

class ArticlesController extends AbstractController
{
    /**
     * @Route("/articles", name="articles")
     */
    public function index()
    {
       //#call my repository to have all what he has 
        $repo = $this->getDoctrine()->getRepository(Article::class);
          //#find the articles as i want all, some, orderBy ...etc#
           $articles = $repo->findAll();
        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' =>$articles,
        ]);
    }
}
