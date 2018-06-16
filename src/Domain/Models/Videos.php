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

namespace App\Domain\Models;

use App\Domain\Models\Interfaces\VideosInterface;
use Ramsey\Uuid\UuidInterface;

/**
 * Class Videos
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Videos implements VideosInterface
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var string
     */
    private $trickId;

    /**
     * @var Tricks
     */
    private $trick;

    /**
     * @var string
     */
    private $url;

    /**
     * @return string
     */
    public function getId(): UuidInterface
    {
        return $this->id;
    }
    /**
     * @return string
     */
    public function getTrickId(): string
    {
        return $this->trickId;
    }

    /**
     * @param string  $trickId
     */
    public function setTrickId(string $trickId)
    {
        $this->trickId = $trickId;
    }

    /**
     * @return Tricks
     */
    public function getTrick()
    {
        return $this->trick;
    }

    /**
     * @param Tricks $trick
     */
    public function setTrick(Tricks $trick)
    {
        $this->trick = $trick;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }
}
