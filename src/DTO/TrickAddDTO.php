<?php


namespace App\DTO;


use App\Entity\Groups;

class TrickAddDTO
{
    /**
     * @var string
     */
    public $name;

    /**
     * @var Groups
     */
    public $group;

    /**
     * @var string
     */
    public $content;

    /**
     * TrickAddDTO constructor.
     * @param string $name
     * @param Groups $group
     * @param string $content
     */
    public function __construct(string $name ='', string $group = '', string $content = '') {
        $this->name = $name;
        $this->group = $group;
        $this->content = $content;
    }

}