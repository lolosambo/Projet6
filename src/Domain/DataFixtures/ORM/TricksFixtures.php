<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Tricks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class TricksFixtures extends Fixture
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 10; $i++) {
            $name = 'Figure '.$i;
            $groupId = rand(1, 5);
            $content = file_get_contents('http://loripsum.net/api/5/short');
            $trick = new Tricks($name, $groupId, $content);
            $trick->setUserId(rand(1, 2));
            $trick->setTrickDate(new \DateTime('+'. mt_rand(2, 100) .' days'));
            $trick->setTrickUpdate(new \DateTime('+'. mt_rand(2, 100) .' days'));
            $manager->persist($trick);
        }
        $manager->flush();
    }
}
