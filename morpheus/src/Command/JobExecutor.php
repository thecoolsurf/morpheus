<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use App\Hook\JobHook;
use App\Converter\XMLConverter;
use App\Validator\Api;

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
        $formatted_ads = [];
        foreach ($files as $file) {
            $vertical = explode('.', $file->getRelativePathname())[0];
            $filepath = $file->getRealPath();
            if ($vertical == 'job') {
                $ads = XMLConverter::xmlToArray($filepath);
                $hooks = new JobHook();
                foreach ($ads as $ad) {
                    array_push($formatted_ads, $hooks->formatAd($ad));
                }
            }
            $api = new Api();
//            $api->send($ads, $vertical);
        }
        print_r($formatted_ads);
        return Command::SUCCESS;
    }

}
