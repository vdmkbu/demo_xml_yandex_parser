<?php


namespace App\Service;


use App\Service\XmlYandex\XmlYandexParser;

class CheckPositionsService
{
    protected XmlYandexParser $parser;

    public function __construct(XmlYandexParser $parser)
    {
        $this->parser = $parser;
    }

    public function getPosition($urls, $host): array
    {
        $position = 1;

        foreach ($urls as $url) {

            $url = $this->parser->getUrl($url);

            if (strripos($url, $host) > 0) {
                // нашли, выходим из цикла
                return [
                    'pos' => $position,
                    'url' => $url,
                    'created_at' => now()
                ];

            }

            $position++;

        }

        // не нашли вхождение
        // сформируем с пустой позицией, сохраним в бд
        return [
            'pos' => 0,
            'url' => null,
            'created_at' => now()
        ];
    }
}
