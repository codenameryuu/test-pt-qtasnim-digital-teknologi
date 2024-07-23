<?php

namespace App\Traits;

use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator as BasePathGenerator;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class SpatiePathGenerator implements BasePathGenerator
{
    /**
     ** Get the path.
     *
     * @param $media
     * @return string
     */
    public function getPath(Media $media): string
    {
        $result = $media->collection_name . '/' . md5($media->id . config('app.key')) . '/';

        return $result;
    }

    /**
     ** Get the path for conversions.
     *
     * @param $media
     * @return string
     */
    public function getPathForConversions(Media $media): string
    {
        $result = $media->collection_name . '/' . md5($media->id . config('app.key')) . '/conversions/';

        return $result;
    }

    /**
     ** Get the path for responsive images.
     *
     * @param $media
     * @return string
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        $result = $media->collection_name . '/' . md5($media->id . config('app.key')) . '/responsives/';

        return $result;
    }
}
