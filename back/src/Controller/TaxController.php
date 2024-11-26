<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Service\TaxCalculator;

class TaxController
{
    #[Route('/api/calculate', methods: ['POST'])]
    public function calculate(Request $request, TaxCalculator $calculator): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        $total = $calculator->calculate($data['basePrice'], $data['vehicleType']);
        return new JsonResponse(['total' => $total]);
    }
}

