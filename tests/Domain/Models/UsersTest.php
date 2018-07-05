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
        $this->user->setAvatar('avatar.png');
    }

    /**
     * @group unit
     */
    public function testEntityMustBeInstancied()
    {
        static::assertInstanceOf(Users::class, $this->user);
    }

    /**
     * @group unit
     */
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

    /**
     * @group unit
     */
    public function testEntityMustHaveValidAttributes()
    {
        $this->user->setInscrDate('2018-03-04T16:56:29.328371+0000');
        static::assertContains('TestUser', $this->user->getPseudo());
        static::assertEquals('2018-03-04T16:56:29.328371+0000', $this->user->getInscrDate());
    }

    /**
     * @group unit
     */
    public function testPasswordMustBeCrypted()
    {
        static::assertContains('ASimplePassword', $this->user->getPassword());
    }

    /**
     * @group unit
     */
    public function testEmailAddressMustMatchWithPattern()
    {
        static::assertTrue($this->user->setMail('test@gmail.com'));
    }

    /**
     * @group unit
     */
    public function testEmailAddressMustReturnNullWithBadPattern()
    {
        static::assertFalse($this->user->setMail('tes/t@gmail.com51'));
    }

    /**
     * @group unit
     */
    public function testVerifiedAttributeMustHave0Or1AsValue()
    {
        static::assertSame(0, $this->user->getVerified());
        $this->user->setVerified(1);
        static::assertSame(1, $this->user->getVerified());

    }

    /**
     * @group unit
     */
    public function testVerifiedAttributeMustReturnFalseWithBadValues()
    {
        $this->user->setVerified(3);
        static::assertSame(0, $this->user->getVerified());
    }

    /**
     * @group unit
     */
    public function testEntityMustHaveADefaultAvatar()
    {
        static::assertContains('avatar.png', $this->user->getAvatar());
    }

    /**
     * @group unit
     */
    public function testAvatarAddressMustBeValid()
    {
        $this->user->setAvatar('exemple.jpg');
        static::assertContains('exemple.jpg', $this->user->getAvatar());
    }

}

