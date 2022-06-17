<?php

namespace App\Service\Mail;

use App\Cache\ReporterCache;
use App\Service\Csv\CsvReport;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;

#use Symfony\Component\Mime\Email;

class MailReport
{
    public function __construct(
        private MailerInterface $mailer,
        private string $projectDir,
        private ReporterCache $csvReport
    ) {
    }

    public function sendMail(string $sendTo, array $header, array $rows, int $year, bool $csv): void
    {
        $email = (new TemplatedEmail())
            ->from('alex.van.trirum@gmail.com')
            ->to($sendTo)
            ->subject("Your Salary Payment Cycles for year $year")
            ->htmlTemplate('email/salary-cycles.html.twig')

            ->context([
                'header' => $header,
                'rows' => $rows,
                'year' => $year
            ]);

        if ($csv) {
            $csv = $this->csvReport->createCsv($header, $rows, $year);
            $email->attachFromPath($this->projectDir."/public/salary/$csv.csv");
        }

        $this->mailer->send($email);
    }
}
