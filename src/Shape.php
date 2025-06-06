<?php

namespace GraphicEditor;

abstract class Shape
{
    protected string $color;
    protected string $path;
    protected int $size;

    public function __construct(array $params, string $path)
    {
        $this->color = $params['color'] ?? '0,0,0';
        $this->size = $params['size'] ?? 100;
        $this->path = $path;
    }

    abstract public function draw(): string;
}