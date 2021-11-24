<?php
namespace Livijn\LaravelObjectDetection;

class ImageObject
{
    public function __construct(public string $class, public float $score, public array $boundingBox) {}
}
