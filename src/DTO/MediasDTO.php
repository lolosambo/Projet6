<?php


namespace App\DTO;


use Symfony\Component\HttpFoundation\File\UploadedFile;

class MediasDTO
{
    /**
     * @var UploadedFile
     */
    public $media;

    /**
     * @var bool
     */
    public $aLaUne;

    /**
     * MediasDTO constructor.
     * @param null $media
     * @param $aLaUne
     */
    public function __construct($media = null, $aLaUne = false) {
        $this->media = $media;
        $this->aLaUne = $aLaUne;
    }

}