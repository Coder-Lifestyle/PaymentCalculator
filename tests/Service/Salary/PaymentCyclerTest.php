<?php

namespace App\Tests;

use App\Service\Salary\PaymentCycler;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class PaymentCyclerTest extends KernelTestCase
{

    public function setUp(): void
    {
        $this->container = static::getContainer();
        $this->salaryService = $this->container->get(PaymentCycler::class);
    }

    public function testThisYearArray(): void
    {
        $thisYear = date("Y");
        $monthData = $this->salaryService->monthIterator($thisYear);

        $this->assertIsArray($monthData,'This year should return an array');
        $this->assertCount(12, $monthData,'Array should contain 12 values');
    }

    public function testPreviousYearArray(): void
    {
        $thisYear = 2000;
        $monthData = $this->salaryService->monthIterator($thisYear);
        $this->assertIsNotArray($monthData,'This year should NOT return an array');
    }
}
