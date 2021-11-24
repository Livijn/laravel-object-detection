<?php
namespace Livijn\LaravelObjectDetection;

use Illuminate\Support\Collection;

class ImageObjectCollection extends Collection
{
    public static function fromJson(string $json): self
    {
        return (new ImageObjectCollection(json_decode($json)))
            ->map(fn ($object) => new ImageObject($object->class, $object->score, $object->bbox));
    }
}
