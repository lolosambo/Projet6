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

use App\Domain\Models\Groups;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

/**
 * Class GroupsFixtures
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class GroupsFixtures extends Fixture
{
    /**
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        for ($i = 1; $i <= 4; $i++) {
            $name = 'Groupe '.$i;
            $group = new Groups();
            $group->setName($name);
            $this->addReference('group'.$i, $group);
            $manager->persist($group);
        }
        $manager->flush();
    }
}
