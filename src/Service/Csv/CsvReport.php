<?php

namespace App\Service\Csv;

use League\Csv\Writer;

class CsvReport
{
    public function __construct(private string $projectDir)
    {
    }

    /**
     * @throws \League\Csv\CannotInsertRecord
     */
    public function createCsv($header, $rows, $year): string
    {
        $writer = Writer::createFromPath($this->projectDir."/public/salary/$year.csv", 'w+');
        $writer->insertOne($header);
        $writer->insertAll($rows);
        return $year;
    }
}
