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

namespace App\Domain\Form\FormHandler;

use App\Domain\Form\FormHandler\Interfaces\FormTypeHandlerInterface;
use App\Domain\Models\Users;
use App\Domain\Repository\Interfaces\UsersRepositoryInterface;
use Symfony\Component\Form\FormInterface;

/**
 * Class InscriptionTypeHandler.
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class InscriptionTypeHandler implements FormTypeHandlerInterface
{
    /**
     * @var UsersRepositoryInterface
     */
    private $ur;

    /**
     * InscriptionTypeHandler constructor.
     *
     * @param UsersRepositoryInterface    $ur
     */
    public function __construct(UsersRepositoryInterface $ur)
    {
        $this->ur = $ur;
    }

    /**
     * @param FormInterface $inscriptionType
     *
     * @return bool
     */
    public function handle(FormInterface $inscriptionType)
    {
        if ($inscriptionType->isSubmitted() && $inscriptionType->isValid()) {
            $encodedPass = sha1($inscriptionType->getData()->password);
            $user = new Users(
                $inscriptionType->getData()->pseudo,
                $encodedPass,
                $inscriptionType->getData()->mail
            );
            $user->setInscrDate(new \DateTime('NOW'));
            $this->ur->save($user);

            return true;
        }

        return false;
    }
}
