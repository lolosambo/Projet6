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

use App\Domain\Models\Interfaces\ImagesInterface;

/**
 * Class images
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class Images implements ImagesInterface
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var int
     */
    private $trickId;

    /**
     * @var Tricks
     */
    private $trick;

    /**
     * @var Boolean
     */
    private $aLaUne = 0;

    /**
     * @var string
     */
    private $url;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return int
     */
    public function getTrickId(): int
    {
        return $this->trickId;
    }

    /**
     * @param int $trickId
     */
    public function setTrickId(int $trickId)
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
     * @return bool
     */
    public function getALaUne()
    {
        return $this->aLaUne;
    }

    /**
     * @param int $aLaUne
     */
    public function setALaUne(int $aLaUne)
    {
        if (($aLaUne == 0) || ($aLaUne == 1)) {
            $this->aLaUne = $aLaUne;
        }
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