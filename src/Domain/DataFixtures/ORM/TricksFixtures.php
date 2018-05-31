<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Tricks;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class TricksFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 30; $i++) {
            $name = 'Figure'.$i;
            $groupId = rand(1, 4);
            $content = file_get_contents('http://loripsum.net/api/5/short');
            $trick = new Tricks($name, $groupId, $content);
            $trick->setUser($this->getReference('user'.rand(1, 10)));
            $trick->setGroup($this->getReference('group'.rand(1, 4)));
            $trick->setTrickDate(new \DateTime('+'. rand(2, 100) .' days'));
            $trick->setTrickUpdate(new \DateTime('+'. rand(2, 100) .' days'));
            $this->addReference('trick'.$i, $trick );
            $manager->persist($trick);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
        UsersFixtures::class,
        GroupsFixtures::class
        ];
    }
}
