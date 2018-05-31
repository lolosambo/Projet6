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

namespace Tests\Domain\DTO;

use App\Domain\DTO\InscriptionUserDTO;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CommentsDTOTest
 *
 *  @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionUserDTOTest extends WebTestCase
{
    /**
     * @var InscriptionUserDTO
     */
    private $dto;

    public function setUp()
    {
        $dto = new InscriptionUserDTO(
            'lolosambo',
            'a-standard-password',
            'lolosambo2@gougueule.com'
        );
        $this->dto = $dto;
    }

    public function testPseudoAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->pseudo);
    }

    public function testPasswordAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->password);
    }

    public function testMailAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->mail);
    }

    public function testMailAttributeMustBeCompatibleWithRegex()
    {
        static::assertRegExp(
            '#([a-zA-Z0-9-_]+)@([a-zA-Z0-9-_]+).([a-zA-Z]+)#',
            $this->dto->mail
        );
    }
}

