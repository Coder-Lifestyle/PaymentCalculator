<?php

namespace App\Controller;

use App\Cache\ReporterCache;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;

class PaymentCyclesController extends AbstractController
{
    public function __construct(private ReporterCache $paymentCycler)
    {
    }

    #[Route('api/payment/cycles', name: 'app_payment_cycles')]
    public function index(): JsonResponse
    {
        return $this->json($this->paymentCycler->getNextYears());
    }

    #[Route('api/payment/cycle/{year}', name: 'app_payment_cycle')]
    public function show($year): JsonResponse
    {
        $report = $this->paymentCycler->monthIterator($year);
        if (!$report) {
            throw $this->createNotFoundException('This year is not supported!');
        }
        return $this->json($report);
    }
}
