<?php


namespace Tests\Entity;


use App\Entity\Users;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class UsersTest extends TestCase
{

    public function test_entity_must_be_instancied() {

        $user = new Users();

        $this->assertInstanceOf(Users::class, $user);
        $this->assertObjectHasAttribute('pseudo', $user);
        $this->assertObjectHasAttribute('password', $user);
        $this->assertObjectHasAttribute('mail', $user);
        $this->assertObjectHasAttribute('activationKey', $user);
        $this->assertObjectHasAttribute('verified', $user);
        $this->assertObjectHasAttribute('inscrDate', $user);
        $this->assertObjectHasAttribute('avatar', $user);

    }

    public function test_entity_must_have_valid_attributes() {

        $user = new Users();
        $user->setPseudo('lolosambo');
        $user->setPassword('0103771544845');
        $user->setMail('lolosambo2@gmail.com');
        $user->setActivationKey('1561561851981561845156487');
        $user->setVerified(1);
        $user->setInscrDate('2018-03-04T16:56:29.328371+0000');
        $user->setAvatar('http://www.b-log-lille.fr/ulpoads/avatar.png');

        $this->assertContains('lolosambo', $user->getPseudo());
        $this->assertContains('0103771544845', $user->getPassword());
        $this->assertContains('lolosambo2@gmail.com', $user->getMail());
        $this->assertContains('1561561851981561845156487', $user->getActivationKey());
        $this->assertEquals(1, $user->getVerified());
        $this->assertEquals('2018-03-04T16:56:29.328371+0000', $user->getInscrDate());
        $this->assertContains('http://www.b-log-lille.fr/ulpoads/avatar.png', $user->getAvatar());

    }

}