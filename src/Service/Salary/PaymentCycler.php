<?php

namespace App\Service\Salary;

use Carbon\Carbon;

class PaymentCycler
{
    public function monthIterator(int $year): null|array
    {
        if (!$this->validateYear($year)) {
            return null;
        }
        for ($m = 1; $m <= 12; $m++) {
            $month = date('F', mktime(0, 0, 0, $m, 15, date('Y')));
            $rows[] = ['month' => $month, 'regular' => $this->getRegularPayDate($month, $year), 'bonus' => $this->getBonusDate($month, $year)];
        }

        return $rows;
    }

    public function getRegularPayDate(string $month, int $year): string
    {
        $lastday = (new Carbon("last day of $month $year"));
        return $lastday->isWeekday() ?
            $lastday->format('Y-m-d') :
            $lastday->endOfMonth()->previousWeekday()->format('Y-m-d');
    }

    public function getBonusDate(string $month, int $year): string
    {
        $bonusday = (new Carbon("15th $month $year"));
        return $bonusday->isWeekday() ?
            $bonusday->format('Y-m-d') :
            $bonusday->nextWeekday()->addDays(2)
                ->format('Y-m-d');
    }

    public function getNextYears(): array
    {
        $currentYear = (int)date("Y");
        for ($i = $currentYear; $i <= ($currentYear + 5); $i++) {
            $years[] = $i;
        }
        return $years;
    }

    public function validateYear($year): bool
    {
        return in_array($year, $this->getNextYears());
    }
}
