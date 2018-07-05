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
use App\Domain\Models\Groups;
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
        $group= $this->createMock(Groups::class);
        $dto = new TrickAddDTO(
            'test Trick',
            $group,
            'content of the fake trick'
        );
        $this->dto = $dto;
    }

    /**
     * @group unit
     */
    public function testNameAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->name);
    }


    /**
     * @group unit
     */
    public function testGroupAttributeMustBeAnInstanceOfGroups()
    {
        static::assertInstanceOf(Groups::class, $this->dto->group);
    }

    /**
     * @group unit
     */
    public function testContentAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->content);
    }
}



