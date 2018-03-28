<?php
namespace App\DTO;


class InscriptionUserDTO
{
    /**
     * @var string
     */
    public $pseudo;

    /**
     * @var string
     */
    public $password;

    /**
     * @var string
     */
    public $password2;

    /**
     * @var string
     */
    public $mail;

    /**
     * InscriptionUserDTO constructor.
     * @param string $pseudo
     * @param string $password
     * @param string $password2
     * @param string $mail
     */
//
    public function __construct(string $pseudo = '', string $password ='', string $password2 = '', string $mail = '') {
        $this->pseudo = $pseudo;
        $this->password = $password;
        $this->password2 = $password2;
        $this->mail = $mail;
    }
}