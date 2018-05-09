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

use App\Domain\DTO\ALaUneDTO;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class ALaUneDTOTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneDTOTest extends WebTestCase
{
    /**
     * @var ALaUneDTO
     */
    private $dto;

    public function setUp() {
        $dto = new ALaUneDTO(1);
        $this->dto = $dto;
    }

    /** @test */
    public function entity_must_be_instancied() {
        static::assertObjectHasAttribute('aLaUne', $this->dto);
    }

    /** @test */
    public function aLaUne_attribute_must_be_0_or_1()
    {
        $this->dto->ALaUne = 1;
        static::assertEquals(1, $this->dto->aLaUne);

    }

    /** @test */
    public function aLaUne_attribute_return_0_if_others_values()
    {
        $dto = new ALaUneDTO(3);
        $this->dto = $dto;
        static::assertEquals(0, $this->dto->aLaUne);
    }

}