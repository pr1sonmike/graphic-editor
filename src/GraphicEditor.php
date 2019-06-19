<?php

namespace GraphicEditor;

use Exception;
use GraphicEditor\Shape\Circle;
use GraphicEditor\Shape\Square;

class GraphicEditor
{
    /**
     * @var array
     */
    protected $shapeProviders = [
        'circle' => Circle::class,
        'square' => Square::class
    ];

    /**
     * @param array $providers
     */
    public function addProviders(array $providers = [])
    {
        $this->shapeProviders = array_merge($this->shapeProviders, $providers);
    }

    /**
     * @param array $shapes
     * @param string $path
     * @return array
     * @throws Exception
     */
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