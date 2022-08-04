<?php

namespace App\Filters;

use Intervention\Image\Image;
use Intervention\Image\Filters\FilterInterface;
use Request;

class ImageSizeFilter implements FilterInterface
{
    public function applyFilter(Image $image)
    {
        $width = 100;
        $height = 100;

        if (Request::has('width')) 
            $width = Request::get('width');

        $height = $image->height() / $image->width() * $width;

        if (Request::has('height') && Request::get('height') != 0) 
            $height = Request::get('height');

        return $image->fit($width, $height);
    }
}