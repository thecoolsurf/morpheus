<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Finder\Finder;
use App\Hook\JobHook;
use App\Converter\XMLConverter;
use App\Converter\JSONConverter;
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
        foreach ($files as $file) {
            $vertical = explode('.', $file->getRelativePathname())[0];
            $filepath = $file->getRealPath();
            var_dump($vertical);
            switch ($vertical) {
                case 'real_estate':
                    $ads = JSONConverter::jsonToArray($filepath);
                break;
                case 'job':
                    $ads = XMLConverter::xmlToArray($filepath);
                break;
                default :
                    $ads = [];
                break;
            }
            $api = new Api();
            $api->send($ads, $vertical);
        }
        $formatted_ads = [];
        $job_hooks = new JobHook();
        foreach ($ads as $ad) {
            array_push($formatted_ads, $job_hooks->formatAd($ad));
        }
        print_r($formatted_ads);
        return Command::SUCCESS;
    }

}
