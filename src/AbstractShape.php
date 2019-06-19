<?php

namespace GraphicEditor;

/**
 * Class Shape
 * @package GraphicEditor
 */
abstract class AbstractShape implements ShapeInterface
{
    /**
     * @var array
     */
    protected $params = [];

    /**
     * @var string
     */
    protected $path;

    /**
     * Shape constructor.
     * @param array $params
     * @param string $path
     */
    public function __construct(array $params = [], $path = __DIR__)
    {
        $this->params = $params;

        $this->path = $path;
    }

    /**
     * @param $name
     * @return mixed|null
     */
    public function __get($name)
    {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        }

        return null;
    }
}
