<?php

namespace GraphicEditor;

use Exception;
use GraphicEditor\Shapes\Circle;
use GraphicEditor\Shapes\Square;

class GraphicEditor
{
    protected $shapeProviders = [
        'circle' => Circle::class,
        'square' => Square::class
    ];

    public function addProviders(array $providers = [])
    {
        $this->shapeProviders = array_merge($this->shapeProviders, $providers);
    }

    public function drawShapes(array $shapes, $path = __DIR__)
    {
        $result = [];
        foreach ($shapes as $shape) {

            if (!isset($this->shapeProviders[$shape['type']])) {
                throw new Exception("Shape type {$shape['type']} not registered");
            }
            $shape = new $this->shapeProviders[$shape['type']] ($shape['params'], $path);
            $result[] = $shape->draw($path);
        }
        return $result;
    }
}
