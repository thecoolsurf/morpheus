<?php

namespace App\Converter;

use DOMElement;
use App\Validator\Api;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\Container;

class XMLConverter
{
    
    private $filepath;

    public function __construct(Container $container)
    {
        $this->filepath = $container->getParameter('kernel.project_dir');
    }
    
    /**
     * 
     * @param string $filename
     * @return array
     */
    public static function xmlToArray(string $filename): array
    {
        $xml = NULL;
        $filepath = '/data/'.$filename.'.xml';
        if(\file_exists($filepath)):
            $DOMDocument = new \DOMDocument();
            $DOMDocument->preserveWhiteSpace = false;
            $DOMDocument->formatOutput = true;
            if($DOMDocument->load($filepath,false)):
                $xml = $DOMDocument;
            endif;
        endif;
//        exit($filepath);
        return [$xml];
    }
    
}

