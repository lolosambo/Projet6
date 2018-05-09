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

namespace Tests\Domain\Models;

use App\Domain\Models\Groups;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

/**
 * Class GroupsTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class GroupsTest extends TestCase
{
    /**
     * @var Groups
     */
    private $group;

    public function setUp() {
        $group = new Groups();
        $group->setGroup('Grabs');
        $this->group = $group;
    }

    public function test_entity_should_be_instancied() {

        static::assertInstanceOf(Groups::class, $this->group);

        static::assertObjectHasAttribute('id', $this->group);
        static::assertObjectHasAttribute('group', $this->group);
    }

    public function test_entity_should_have_valid_attributes() {

        static::assertContains('Grabs', $this->group->getGroup());
    }
}
