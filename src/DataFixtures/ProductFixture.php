<?php

namespace App\DataFixtures;
use App\Entity\Project;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ProductFixture extends Fixture
{
    public function load(ObjectManager $manager)
    {
        $product = new Project();
        $product->setProjectName('projectName test');
        $product->setDescription('description test');
       
        $manager->persist($product);

        // add more products

        $manager->flush();
    }
}
