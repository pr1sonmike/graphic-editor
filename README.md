# Graphic Editor

Geometric shapes graphic editor. 

### Installation
`composer require nurbek-chymbaev/graphic-editor:dev-master`

### Usage

```php
require __DIR__ . '/vendor/autoload.php';

use GraphicEditor\GraphicEditor;

$shapes = [
    [
        'type' => 'circle',
        'params' => [
            'color' => '0,255,0',        
            'size' => 500
        ]
    ],
    [
        'type' => 'square',
        'params' => [
            'color' => '255,0,0',
            'size' => 300
        ]
    ]
];
$editor = new GraphicEditor();
$images = $editor->drawShapes($shapes, __DIR__);
var_dump($images);
```

### Add custom shape

```php

use GraphicEditor\GraphicEditor;
use GraphicEditor\Shape;

class Ellipse extends Shape
{
    public function draw()
    {
        $width = $this->width;
        $height = $this->height;     
        $middle1 = $this->width / 2;
        $middle2 = $this->height / 2;           
        list($red, $green, $blue) = explode(',', $this->color);                
        $filename = $this->path . '/ellipse_' . rand(1, 10000) . '.png';
        
        $image = imagecreatetruecolor($width, $height);
        imageantialias($image, true);
        $color = imagecolorallocate($image, $red, $green, $blue);
        imagefilledellipse($image, $middle1, $middle2, $width, $height, $color);
        imagepng($image, $filename);
        imagedestroy($image);
        return $filename;
    }
}

$providers = [
    'ellipse' => Ellipse::class
];

$shapes = [   
    [
        'type' => 'ellipse',
        'params' => [
            'color' => '0,0,255',
            'width' => 200,
            'height' => 300
        ]
    ],
];

$editor = new GraphicEditor();
$editor->addProviders($providers);
$images = $editor->drawShapes($shapes, __DIR__);
var_dump($images);
```
