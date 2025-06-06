<?php

namespace GraphicEditor\Shapes;

use GraphicEditor\Shape;

class Circle extends Shape
{
    public function draw(): string
    {
        $width = $this->size;
        $height = $this->size;
        $middle = $this->size / 2;
        list($red, $green, $blue) = explode(',', $this->color);
        $filename = $this->path . '/circle_' . rand(1, 10000) . '.png';

        $image = imagecreatetruecolor($width, $height);
        imageantialias($image, true);
        $color = imagecolorallocate($image, $red, $green, $blue);
        imagefilledellipse($image, $middle, $middle, $width, $height, $color);
        imagepng($image, $filename);
        imagedestroy($image);
        return $filename;
    }
}