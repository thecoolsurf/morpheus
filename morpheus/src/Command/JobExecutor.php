<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use App\Hook\JobHook;
use App\Converter\XMLConverter;

class JobExecutor extends Command
{
    
    protected function configure()
    {
        $this->setName('job-executor');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $ads           = XMLConverter::xmlToArray('job');
        $formatted_ads = [];
        $formatter_ads = new JobHook();
        foreach ($ads as $ad) {
            array_push($formated_ad, $formatter_ads->formatAd($ad));
        }
//        send($inputs,$vertical);
        print_r($ads);
        return Command::SUCCESS;
    }
    
}
