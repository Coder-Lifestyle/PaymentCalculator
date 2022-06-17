<?php

namespace App\Command;

use App\Service\Csv\CsvReport;
use App\Service\Mail\MailReport;
use App\Service\Salary\PaymentCycler;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Style\SymfonyStyle;

class CalculatePaymentCyclesCommand extends Command
{
    protected static $defaultName = 'salary:report';

    public function __construct(
        private PaymentCycler $paymentCycler,
        private MailReport $mailReport
    )
    {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->success([
            'Starting up the Payment Cycles Creator'
        ]);

        $choice = new ChoiceQuestion('Which year would you like to export?', $this->paymentCycler->getNextYears());

        $year = $io->askQuestion($choice);
        $email = $io->ask('What is your email address?', '', function ($email) {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new \RuntimeException('You must enter a valid email address.');
            }
            return (string)$email;
        });

        $header = ['Month', 'Bonus Date', 'Regular Date'];

        $table = new Table($output);
        $table->setHeaderTitle('Payment Dates');
        $table->setHeaders($header);
        $rows = $this->paymentCycler->monthIterator($year);
        $table->setRows($rows);
        $table->render();
        $this->mailReport->sendMail($email, $header, $rows, $year, true);
        $io->success(['Sending report to: ' . $email ]);

        return Command::SUCCESS;
        //TODO: implement try/catch error handler


        // or return this if some error happened during the execution
        // (it's equivalent to returning int(1))
        // return Command::FAILURE;

        // or return this to indicate incorrect command usage; e.g. invalid options
        // or missing arguments (it's equivalent to returning int(2))
        // return Command::INVALID
    }
}
