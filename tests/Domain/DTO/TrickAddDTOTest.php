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

use App\Domain\DTO\TrickAddDTO;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CommentsDTOTest
 *
 *  @author Laurent BERTON <lolosambo2@gmail.com>
 */
class TrickAddDTOTest extends WebTestCase
{
    /**
     * @var TrickAddDTO
     */
    private $dto;

    public function setUp()
    {
        $dto = new TrickAddDTO(
            'test Trick',
            '1',
            'content of the fake trick'
        );
        $this->dto = $dto;
    }

    /**
     * @test
     */
    public function name_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->name);
    }

    /**
     * @test
     */
    public function group_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->group);
    }

    /**
     * @test
     */
    public function content_attribute_must_be_a_string()
    {
        static::assertInternalType('string', $this->dto->content);
    }
}


