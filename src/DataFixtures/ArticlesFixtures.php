<?php

namespace App\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use App\Entity\Article;

class ArticlesFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        // create 20 articles! Bam!
        for ($i = 0; $i < 16; $i++) {
            $article = new Article();
            $article->setTitle('article title No'.$i);
            $article->setDetail('<p> это текст-"рыба", часто используемый в печати и вэб-дизайне. 
            Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.</p>No'.$i);
            $article->setImage('http://placehold.it/300x256');
            $article->setCreatedAt(new \dateTime());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
