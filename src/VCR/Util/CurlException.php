<?php

namespace VCR\Util;

class CurlException extends \Exception
{
    private $info;

    /**
     * @param resource $ch The cURL handler
     * @return CurlException
     */
    public static function create($ch)
    {
        $e = new CurlException(curl_error($ch), curl_errno($ch));
        $e->info = curl_getinfo($ch);
        return $e;
    }

    /**
     * Returns the curl_info array.
     *
     * @return array
     */
    public function getInfo()
    {
        return $this->info;
    }
}