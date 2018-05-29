<?php

declare(strict_types=1);

/*
 * This file is part of the SnowTricks project.
 *
 * (c) Laurent BERTON <lolosambo2@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Domain\DataFixtures\ORM;

use App\Domain\Models\Users;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class UsersFixtures
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UsersFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 10; $i++) {
            $pseudo = 'User'.$i;
            $password = sha1('MySuperPassword');
            $mail = 'emailforuser'.$i.'@provider.com';
            $user = new Users($pseudo, $password, $mail);
            $user->setInscrDate(new \DateTime('+'. mt_rand(2, 100) .' days'));
            $user->setAvatar('../images/avatar.png');
            $this->addReference('user'.$i, $user );
            $manager->persist($user);
        }
        $manager->flush();
    }
}