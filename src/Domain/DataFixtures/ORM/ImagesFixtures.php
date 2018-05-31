<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Images;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class ImagesFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 1000; $i++) {
            $url = 'test'.rand(1, 4).'.jpg';
            $image = new Images();
            $image->setTrick($this->getReference('trick'.rand(1, 10)));
            $image->setUrl($url);
            $manager->persist($image);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
        TricksFixtures::class
        ];
    }
}