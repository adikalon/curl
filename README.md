# Curl
**hellpers/curl** - Обертка для cURL.

## Установка:
	composer require hellpers/curl

## Пример:
```php
use Hellpers\Curl;

/*
|-------------------------------------------------------------------------------
| Пример запроса
|-------------------------------------------------------------------------------
|
| Curl::request() принимает два параметра:
|
| 1. Строка или массив. Либо URL ресурса, либо массив параметров для PHP функции 
| curl_setopt_array();
| 2. Число. Задержка перед запросом в микросекундах (по умолчанию - 0).
|
| Метод возвращает строку - ответ на запрос.
|
*/
$response = Curl::request(
    [
        CURLOPT_URL        => 'https://ya.ru/',
        CURLOPT_HTTPHEADER => [
            'Host: ya.ru',
            'User-Agent: Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:67.0) '
                . 'Gecko/20100101 Firefox/67.0'
        ],
    ],
    2
);

var_dump($response);

```
