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

    /**
     * @test
     */
    public function pseudo_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->pseudo);
    }

    /**
     * @test
     */
    public function password_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->password);
    }

    /**
     * @test
     */
    public function mail_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->mail);
    }

    /** @test */
    public function mail_attribute_must_be_compatible_with_regex()
    {
        static::assertRegExp(
            '#([a-zA-Z0-9-_]+)@([a-zA-Z0-9-_]+).([a-zA-Z]+)#',
            $this->dto->mail
        );
    }
}

