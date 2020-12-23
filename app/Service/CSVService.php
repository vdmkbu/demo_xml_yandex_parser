<?php


namespace App\Service;


use League\Csv\Writer;

class CSVService
{
    public function prepareHeaders($regions): array
    {
        $headers = ['word'];
        foreach($regions as $region) {
            $headers[] = $region->region->region;
        }

        return $headers;
    }

    public function prepareBody($positions): array
    {
        $body = [];
        foreach($positions as $position) {
            $body[] = array_merge([$position->word->word], explode(',', $position->positions));

        }

        return $body;
    }

    public function make(array $headers, array $body): Writer
    {
        $csv = Writer::createFromString();
        $csv->insertOne($headers);
        $csv->insertAll($body);

        return $csv;
    }
}
