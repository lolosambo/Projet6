<?php
namespace App\DTO;


class ConnectUserDTO
{
    /**
     * @var
     */
    public $pseudo;

    /**
     * @var
     */
    public $password;

    /**
     * @var
     */
    public $mail;

    /**
     * ConnectUserDTO constructor.
     * @param $pseudo
     * @param $password
     * @param $mail
     */
    public function __construct($pseudo = null, $password = null, $mail = null) {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->mail = $mail;
    }

}