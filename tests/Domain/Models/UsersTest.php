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
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

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
    
    public function setUp()
    {
        $user = new Users('TestUser', 'ASimplePassword', 'test@gmail.com');
        $this->user = $user;
    }

    public function testEntityMustBeInstancied()
    {
        static::assertInstanceOf(Users::class, $this->user);
    }

    public function testEntityMustHaveGoodAttributes()
    {
        static::assertObjectHasAttribute('id', $this->user);
        static::assertObjectHasAttribute('pseudo', $this->user);
        static::assertObjectHasAttribute('password', $this->user);
        static::assertObjectHasAttribute('mail', $this->user);
        static::assertObjectHasAttribute('verified', $this->user);
        static::assertObjectHasAttribute('inscrDate', $this->user);
        static::assertObjectHasAttribute('avatar', $this->user);
    }

    public function testEntityMustHaveValidAttributes()
    {
        $this->user->setInscrDate('2018-03-04T16:56:29.328371+0000');
        static::assertContains('TestUser', $this->user->getPseudo());
        static::assertEquals('2018-03-04T16:56:29.328371+0000', $this->user->getInscrDate());
    }

    public function testPasswordMustBeCrypted()
    {
        static::assertContains('ASimplePassword', $this->user->getPassword());
    }

    public function testEmailAddressMustMatchWithPattern()
    {
        static::assertTrue($this->user->setMail('test@gmail.com'));
    }

    public function testEmailAddressMustReturnNullWithBadPattern()
    {
        static::assertFalse($this->user->setMail('tes/t@gmail.com51'));
    }

    public function testVerifiedAttributeMustHave0Or1AsValue()
    {
        $verified = $this->user->setVerified(1);
        static::assertTrue($verified);
        $verified = $this->user->setVerified(0);
        static::assertTrue($verified);
    }

    public function testVerifiedAttributeMustReturnFalseWithBadValues()
    {
        $verified = $this->user->setVerified(145);
        static::assertFalse($verified);
    }

    public function testEntityMustHaveADefaultAvatar()
    {
        static::assertContains('../images/avatar.png', $this->user->getAvatar());
    }

    public function testAvatarAddressMustBeValid()
    {
        $this->user->setAvatar('../uploads/avatars/exemple.jpg');
        static::assertContains('../uploads/avatars/exemple.jpg', $this->user->getAvatar());
    }

    public function testAvatarWrongAddressMustReturnDefaultAvatar()
    {
        $this->user->setAvatar('../upload/avatar/bad_exemple.gif');
        static::assertContains('../images/avatar.png', $this->user->getAvatar());
    }
}

