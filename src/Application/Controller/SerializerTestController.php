<?php

declare(strict_types=1);

namespace App\Application\Controller;

use App\Domain\Serializer\NestedSerializer;
use App\Domain\Serializer\TestSerializer;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerTestController
{
    /**
     * @Route("/serializer-test", name="serializer-test")
     */
    public function __invoke(SerializerInterface $serializer): Response
    {
        $start = microtime(true);

        $responseData = [];
        for ($i = 0; $i < 10000; $i++) {
            $responseData[] = new TestSerializer(
                true,
                10,
                'string',
                10.1,
                new NestedSerializer('test object'),
                [],
                [
                    new NestedSerializer('nested test')
                ]
            );
        }


        $response = $serializer->serialize($responseData, 'json');

        $end =  microtime(true) - $start;
        dump($end);
        dump('10k records');
        return new Response($response);
    }
}