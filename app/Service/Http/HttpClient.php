<?php


namespace App\Service\Http;


interface HttpClient
{
    public function request(array $query);
}
