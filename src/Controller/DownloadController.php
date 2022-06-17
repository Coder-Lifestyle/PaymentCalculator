<?php

namespace App\Controller;

use App\Cache\ReporterCache;
use App\Service\Salary\PaymentCycler;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\BinaryFileResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\ResponseHeaderBag;
use Symfony\Component\Routing\Annotation\Route;

class DownloadController extends AbstractController
{
    public function __construct(private PaymentCycler $paymentCycler, private ReporterCache $csvReport, private string $projectDir)
    {
    }

    #[Route('/download/{year}', name: 'app_download')]
    public function index($year): Response
    {
        $header = ['Month', 'Bonus Date', 'Regular Date'];
        $rows = $this->paymentCycler->monthIterator($year);
        if (!$rows) {
            return $this->redirectToRoute('error');
        }
        $csv = $this->csvReport->createCsv($header, $rows, $year);

        $response = new BinaryFileResponse($this->projectDir . "/public/salary/$csv.csv");
        $response->headers->set('Content-Type', 'text/plain');
        return  $response->setContentDisposition(
            "attachment",
            "$year.csv"
        );
    }
}
