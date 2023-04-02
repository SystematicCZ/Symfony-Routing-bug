<?php
declare(strict_types=1);

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AController extends AbstractController
{
    /**
     * @throws \Exception
     */
    #[Route(path: '/', name: 'a_method_one')]
    public function aMethodOne(): Response
    {
        throw new \Exception('A method one');
    }

    /**
     * @throws \Exception
     */
    #[Route(path: '/two', name: 'b_method_one')]
    public function aMethodTwo(): Response
    {
        throw new \Exception('A method two');
    }
}
