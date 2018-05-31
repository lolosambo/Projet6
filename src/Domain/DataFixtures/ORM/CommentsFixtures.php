<?php
namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Comments;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\DataFixtures\DependentFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class CommentsFixtures extends Fixture implements DependentFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i < 200; $i++) {
            $content = file_get_contents('http://loripsum.net/api/1/short');
            $comment = new Comments($content);
            $comment->setUser($this->getReference('user'.rand(1, 10)));
            $comment->setTrick($this->getReference('trick'.rand(1, 10)));
            $comment->setCommentDate(new \DateTime('+'. mt_rand(2, 100) .' days'));
            $comment->setCommentUpdate(new \DateTime('+'. mt_rand(2, 100) .' days'));
            $manager->persist($comment);
        }
        $manager->flush();
    }

    public function getDependencies()
    {
        return [
        UsersFixtures::class,
        TricksFixtures::class
        ];
    }
}