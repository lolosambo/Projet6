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

use App\Domain\DTO\CommentDTO;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class CommentsDTOTest
 *
 *  @author Laurent BERTON <lolosambo2@gmail.com>
 */
class CommentsDTOTest extends WebTestCase
{
    /**
     * @var CommentDTO
     */
    private $dto;

    public function setUp()
    {
        $dto = new CommentDTO('Essai de commentaire avec chaine de carctères valide');
        $this->dto = $dto;
    }

    public function testContentAttributeMustBeAString()
    {
        static::assertInternalType('string', $this->dto->content);
    }
}
