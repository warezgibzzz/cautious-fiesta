<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Domain\View\NestedTestView;
use App\Domain\View\TestView;
use App\Infrastructure\Service\StdClassViewFactory;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class ViewTestController
{
    /**
     * @Route("view-test", name="view_test")
     */
    public function __invoke(StdClassViewFactory $viewFactory): JsonResponse
    {
        $start = microtime(true);

        $responseData = [];
        for ($i = 0; $i < 10000; $i++) {
            $nested = $viewFactory->render(NestedTestView::class, ['nested' => true]);

            $responseData[] = $viewFactory->render(TestView::class, [
                'test' => true,
                'string' => '123',
                'int' => 10,
                'float'=> 1.10,
                'object' => $nested,
                'array' => [],
                'nested' => [$nested]
            ]);
        }


        $response = new JsonResponse(
            $responseData
        );

        $end =  microtime(true) - $start;
        dump($end);
        dump('10k records');
        return $response;
    }
}