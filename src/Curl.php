<?php

namespace Hellpers;

use Exception;

class Curl
{
    /**
     * Запрос cURL'ом
     * 
     * @param string|array $opt URL или массив параметров для
     * curl_setopt_array()
     * @param int $delay (optional) Задержка перед запросом в микросекундах
     * @return string Ответ на запрос
     * @throws Exception
     */
    public static function request($opt, int $delay = 0): string
    {
        $options = [];
        $request = '';
        $curl    = null;

        if (is_string($opt)) {
            $options[CURLOPT_URL] = $opt;
        } elseif (is_array($opt)) {
            $options = $opt;
        } else {
            throw new Exception(
                'Параметр $opt должен быть строкой или массивом'
            );
        }

        $options[CURLOPT_RETURNTRANSFER] = true;

        if ($delay > 0) {
            usleep($delay);
        }

        $curl = curl_init();

        curl_setopt_array($curl, $options);

        $request = curl_exec($curl);

        curl_close($curl);

        unset($opt, $delay, $options, $curl);

        return $request;
    }
}
