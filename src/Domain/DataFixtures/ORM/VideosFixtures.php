<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Videos;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class VideosFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 100; $i++) {
            $url = 'https://www.youtube.com/embed/OKcnj7Pf9R4';
            $video = new Videos();
            $video->setTrick($this->getReference('trick'.rand(1, 10)));
            $video->setUrl($url);
            $manager->persist($video);
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