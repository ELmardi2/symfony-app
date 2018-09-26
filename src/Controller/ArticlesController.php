<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;

class ArticlesController extends AbstractController
{
    /**
     * @Route("articles", name="articles")
     */
    public function index(ArticleRepository $repo)
    {
       //#call my repository to have all what he has 
        //$repo = $this->getDoctrine()->getRepository(Article::class);
          //#find the articles as i want all, some, orderBy ...etc#
           $articles = $repo->findAll();
        return $this->render('articles/index.html.twig', [
            'controller_name' => 'ArticleController',
            'articles' =>$articles,
        ]);
    }
      /**
     * @Route("/articles/{id}", name="articles_show")
     */
    public function show(Article $article)
    {
        return $this->render('/articles/show.html.twig', [
            'article' =>$article,
        ]);
    }
}
