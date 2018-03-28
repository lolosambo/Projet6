<?php


namespace Tests\Entity;

use App\Entity\Groups;
use Symfony\Bundle\TwigBundle\Tests\TestCase;

class GroupsTest extends TestCase
{
    private $group;

    public function setUp() {
        $group = new Groups('Grabs');
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