<?php

namespace GraphicEditor;

abstract class Shape implements ShapeDrawer
{
    protected $params = [];

    protected $path;

    public function __construct(array $params = [], $path = __DIR__)
    {
        $this->params = $params;

        $this->path = $path;
    }

    public function __get($name)
    {
        if (isset($this->params[$name])) {
            return $this->params[$name];
        }

        return null;
    }
}
