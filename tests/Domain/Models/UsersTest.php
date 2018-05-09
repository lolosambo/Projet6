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

use App\Domain\Models\Users;
use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

/**
 * Class UsersTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class UsersTest extends WebTestCase
{
    /**
     * @var Users
     */
    private $user;
    
    public function setUp() {
        $user = new Users('TestUser', 'ASimplePassword', 'test@gmail.com');
        $this->user = $user;
    }

    public function test_entity_must_be_instancied() {
        static::assertInstanceOf(Users::class, $this->user);
    }

    /** @test */
    public function entity_must_have_good_attributes() {

        static::assertObjectHasAttribute('id', $this->user);
        static::assertObjectHasAttribute('pseudo', $this->user);
        static::assertObjectHasAttribute('password', $this->user);
        static::assertObjectHasAttribute('mail', $this->user);
        static::assertObjectHasAttribute('verified', $this->user);
        static::assertObjectHasAttribute('inscrDate', $this->user);
        static::assertObjectHasAttribute('avatar', $this->user);
    }

    /** @test */
    public function entity_must_have_valid_attributes() {

        $this->user->setInscrDate('2018-03-04T16:56:29.328371+0000');

        static::assertContains('TestUser', $this->user->getPseudo());
        static::assertEquals('2018-03-04T16:56:29.328371+0000', $this->user->getInscrDate());
    }

    /** @test */
    public function password_must_be_crypted() {

        static::assertContains('ASimplePassword', $this->user->getPassword());
    }

    /** @test */
    public function email_address_must_match_with_pattern() {

        static::assertTrue($this->user->setMail('test@gmail.com'));
    }

    /** @test */
    public function email_address_must_return_null_with_bad_pattern() {

        static::assertFalse($this->user->setMail('tes/t@gmail.com51'));
    }

    /** @test */
    public function verified_attribute_must_have_0_or_1_as_value() {
        $verified = $this->user->setVerified(1);
        static::assertTrue($verified);
        $verified = $this->user->setVerified(0);
        static::assertTrue($verified);
    }

    /** @test */
    public function verified_attribute_must_return_false_with_bad_values() {
        $verified = $this->user->setVerified(145);
        static::assertFalse($verified);
    }

    /** @test */
    public function entity_must_have_a_default_avatar() {

        static::assertContains('../images/avatar.png', $this->user->getAvatar());
    }

    /** @test */
    public function avatar_address_must_be_valid() {

        $this->user->setAvatar('../uploads/avatars/exemple.jpg');
        static::assertContains('../uploads/avatars/exemple.jpg', $this->user->getAvatar());
    }

    /** @test */
    public function avatar_wrong_address_must_return_default_avatar() {

        $this->user->setAvatar('../upload/avatar/bad_exemple.gif');
        static::assertContains('../images/avatar.png', $this->user->getAvatar());
    }
}
