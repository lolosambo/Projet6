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
namespace App\UI\Actions\Interfaces;
use App\UI\Responders\ConnectionFormResponder;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;
/**
 * Interface ConnectionFormActionInterface
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
interface ConnectionFormActionInterface
{
    public function __invoke(
        Request $request,
        AuthenticationUtils $authenticationUtils,
        ConnectionFormResponder $connectionFormResponder
    );
}
