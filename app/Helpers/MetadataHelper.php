<?php

namespace App\Helpers;

class MetadataHelper
{
    /**
     ** Metadata.
     *
     * @return object
     */
    public static function metadata()
    {
        $result = (object) [
            'title' => 'CRUD',
            'description' => '',
            'keywords' => '',
        ];

        return $result;
    }
}
