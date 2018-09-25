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
        for ($i = 1; $i < 16; $i++) {
            $article = new Article();
            $article->setTitle("article title No".$i)
                ->setDetail(" <p>это текст-рыба, часто используемый в печати и вэб-дизайне. 
                является стандартной рыбой для текстов на латинице с начала XVI века</p>N°".$i)
                ->setImage("http://placehold.it/350x150")
                ->setCreatedAt(new \dateTime());

            $manager->persist($article);
        }

        $manager->flush();
    }
}
