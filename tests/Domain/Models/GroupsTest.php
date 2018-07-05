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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

/**
 * Class GroupsTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class GroupsTest extends WebTestCase
{
    /**
     * @var Groups
     */
    private $group;

    public function setUp() {
        $group = new Groups();
        $group->setName('Grabs');
        $this->group = $group;
    }

    /**
     * @group unit
     */
    public function testEntityShouldBeInstancied()
    {
        static::assertInstanceOf(Groups::class, $this->group);
        static::assertObjectHasAttribute('id', $this->group);
        static::assertObjectHasAttribute('name', $this->group);
    }

    /**
     * @group unit
     */
    public function testEntityShouldHaveValidAttributes()
    {
        static::assertContains('Grabs', $this->group->getName());
    }
}

