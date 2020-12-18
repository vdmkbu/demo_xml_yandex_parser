<?php


namespace App\Service\Http;


use Illuminate\Support\Facades\Http;

class Client implements HttpClient
{
    protected const URL = 'https://yandex.ru/search/xml';

    public function request(array $query)
    {
        $query = array_merge($query, $this->data());
        $url = self::URL . '?' . http_build_query($query);


        $response = Http::get($url);

        if (!$response) {
            logger()->error('xml.yandex error');
            throw new \Exception('xml.yandex error');
        }

        return $response;


    }

    private function data(): array
    {
        return [
            'user' => config('yandex.user'),
            'key' => config('yandex.key'),
            'groupby' => config('yandex.groupby')
        ];
    }
}
