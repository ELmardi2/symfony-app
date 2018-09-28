<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Article;
use App\Repository\ArticleRepository;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

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
     * @Route("/articles/new", name="create_article")
     */
    public function create(Request $request, ObjectManager $manager)
    {
        // //store an article use classic
        // if ($request->request->count() > 0) {
        //     $article = new article();
        //     $article->setTitle($request->request->get('title'))
        //     ->setDetail($request->request->get('detail'))
        //     ->setImage($request->request->get('image'))
        //     ->setCreatedAt(new \DateTime());
        //     $manager->persist($article);

        //     $manager->flush();
        //     return $this->redirectToRoute('articles');    
        // }
       $article = new Article();
       $form = $this->createFormBuilder()
       ->add('title', textType::class, [
           'attr' => [
               "placeholder"=>"type your Title here",
           ]
       ])
       ->add('image', textType::class, [
        'attr' => [
            "placeholder"=>"put your image here",
        ]
        ])
       ->add('detail', textareaType::class, [
        'attr' => [
            "placeholder"=>"type your Title detail",
        ]
        ])
       ->getForm();

        return $this->render('/articles/create.html.twig', [
            'formArticle' => $form->createView()
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
