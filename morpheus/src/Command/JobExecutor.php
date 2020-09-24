<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use App\Hook\JobHook;
use App\Converter\XMLConverter;
use App\Converter\JSONConverter;

class JobExecutor extends Command
{

    protected function configure()
    {
        $this->setName('job-executor');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $finder = new Finder();
        $files = $finder->in('./data');
        foreach ($files as $file) {
            $vertical = explode('.', $file->getRelativePathname())[0];
            $filepath = $file->getRealPath();
            switch ($vertical) {
                case 'real_estate':
                    $ads = JSONConverter::jsonToArray($filepath);
                break;
                case 'job':
                    $ads = XMLConverter::xmlToArray($filepath);
                break;
                default :
                    $ads = XMLConverter::xmlToArray($filepath);
                break;
            }
        }
        $formatted_ads = [];
        $job_hooks = new JobHook();
//        foreach ($ads as $ad) {
//            array_push($formatted_ads, $job_hooks->formatAd($ad));
//        }
//        send($inputs,$vertical);
//        print_r($formatted_ads);
        return Command::SUCCESS;
    }

}
