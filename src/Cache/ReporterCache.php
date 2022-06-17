<?php

namespace App\Cache;

use App\Service\Csv\CsvReport;
use App\Service\Salary\PaymentCycler;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class ReporterCache
{
    public function __construct(private CacheInterface $cache, private PaymentCycler $paymentCycler, private CsvReport $csvReport)
    {
    }

    public function monthIterator(string $year): ?array
    {
        return $this->cache->get($year, function (ItemInterface $item) use ($year) {
            $item->expiresAfter(31556926);
            return $this->paymentCycler->monthIterator($year);
        });
    }

    public function getNextYears(): ?array
    {
        return $this->cache->get('getNextYears', function (ItemInterface $item) {
            $item->expiresAfter(31556926);
            return $this->paymentCycler->getNextYears();
        });
    }

    public function createCsv($header, $rows, $year): string
    {
        return $this->cache->get("csvreport.$year", function (ItemInterface $item) use ($header, $rows, $year) {
            $item->expiresAfter(31556926);
            return $this->csvReport->createCsv($header, $rows, $year);
        });
    }
}
