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


namespace App\Domain\Models\Interfaces;
use App\Domain\Models\Tricks;
use Ramsey\Uuid\UuidInterface;


/**
 * Interface ImagesInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ImagesInterface
{
    /**
     * @return UuidInterface
     */
    public function getId();

    /**
     * @return UuidInterface
     */
    public function getTrickId();

    /**
     * @param string  $trickId
     *
     */
    public function setTrickId(string $trickId);

    /**
     * @return mixed
     */
    public function getTrick();

    /**
     * @param Tricks $trick
     *
     * @return mixed
     */
    public function setTrick(Tricks $trick);

    /**
     * @return mixed
     */
    public function getALaUne();

    /**
     * @param bool $aLaUne
     * @return mixed
     */
    public function setALaUne(int $aLaUne);

    /**
     * @return mixed
     */
    public function getUrl();

    /**
     * @param string $url
     */
    public function setUrl(string $url);

}