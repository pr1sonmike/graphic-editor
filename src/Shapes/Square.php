<?php

namespace GraphicEditor\Shapes;

use GraphicEditor\Shape;

class Square extends Shape
{
    public function draw()
    {
        $width = $this->size;
        list($red, $green, $blue) = explode(',', $this->color);
        $filename = $this->path . '/square_' . rand(1, 10000) . '.png';

        $image = imagecreatetruecolor($width, $width);
        $color = imagecolorallocate($image, $red, $green, $blue);
        imageantialias($image, true);
        imagefilledrectangle ($image, 0, 0, $width, $width, $color);
        imagepng($image, $filename);
        imagedestroy($image);

        return $filename;
    }
}