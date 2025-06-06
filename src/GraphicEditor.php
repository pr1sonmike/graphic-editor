<?php

namespace GraphicEditor;

use Exception;
use GraphicEditor\Shapes\Circle;
use GraphicEditor\Shapes\Square;

class GraphicEditor
{
    protected array $shapeProviders = [
        'circle' => Circle::class,
        'square' => Square::class
    ];

    public function addProviders(array $providers = []): void
    {
        $this->shapeProviders = array_merge($this->shapeProviders, $providers);
    }

    /**
     * @throws Exception
     */
    public function drawShapes(array $shapes, string $path = __DIR__): array
    {
        $result = [];
        foreach ($shapes as $shape) {
            if (!isset($this->shapeProviders[$shape['type']])) {
                throw new Exception("Shape type {$shape['type']} not registered");
            }
            $shapeObj = new $this->shapeProviders[$shape['type']]($shape['params'], $path);
            $result[] = $shapeObj->draw();
        }
        return $result;
    }
}