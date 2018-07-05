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
namespace Tests\UI\Actions;

use App\Domain\Form\FormHandler\ALaUneTypeHandler;
use App\Domain\Models\Images;
use App\Domain\Repository\Interfaces\ImagesRepositoryInterface;
use App\UI\Actions\ALaUneAction;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Generator\UrlGenerator;

/**
 * Class AddTrickActionTest
 *
 * @author Laurent BERTON <lolosambo2@gmail.com>
 */
class ALaUneActionTest extends WebTestCase
{
    private $repository;

    private $generator;

    public function setUp()
    {
        $this->repository = $this->createMock(ImagesRepositoryInterface::class);
        $this->generator = $this->createMock(UrlGenerator::class);
    }

    /**
     * @group unit
     */
    public function testConstruct()
    {
        $action = new ALaUneAction($this->repository);
        static::assertInstanceOf(
            ALaUneAction::class,
            $action
        );
    }

    public function testInvokeALaUne()
    {
        $request = Request::create(
            '/image_a_la_une/1002',
            'POST'
        );
        $action = new ALaUneAction($this->repository);
        static::assertInstanceOf(RedirectResponse::class,
            $action(
                $request,
                $this->generator
            )
        );
    }
}
