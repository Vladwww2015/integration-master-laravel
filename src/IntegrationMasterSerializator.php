<?php

namespace IntegrationHelper\IntegrationMasterLaravel;

class IntegrationMasterSerializator
{
    /**
     * @param string $data
     * @return array
     */
    public static function decode(string $data): array
    {
        try {
            return json_decode(base64_decode($data), true);
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * @param array $data
     * @return string
     */
    public static function encode(array $data): string
    {
        return base64_encode(json_encode($data));
    }
}
