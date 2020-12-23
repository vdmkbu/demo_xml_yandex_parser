<?php


namespace App\Service\RegionsImport;


class RegionXmlParser
{
    public function parse(string $xml)
    {
        $xml = simplexml_load_string($xml);

        if (!$xml) {
            throw new \Exception('XML file with bad format');
        }

        return $xml->data->insert[1]->values;
    }
}
