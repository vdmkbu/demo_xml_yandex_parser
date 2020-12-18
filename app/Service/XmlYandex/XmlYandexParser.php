<?php


namespace App\Service\XmlYandex;


class XmlYandexParser
{
    public function parse($xml)
    {
        $xml = simplexml_load_string($xml);

        if (!$xml) {
            throw new \Exception('XML parse failure');
        }

        return $this->getUrls($xml);
    }

    public function getUrl(\SimpleXMLElement $element)
    {
        $url = $element->doc->url;

        if (empty($url)) {
            throw new \Exception('Bad XML format');
        }
        return trim((string)$url);
    }

    protected function getUrls(\SimpleXMLElement $element)
    {
        $group = $element->response->results->grouping->group;

        if (empty($group)) {
            throw new \Exception('Bad XML format');
        }
        return $group;
    }
}
