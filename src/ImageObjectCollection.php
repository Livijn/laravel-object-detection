<?php
namespace Livijn\LaravelObjectDetection;

use Illuminate\Support\Collection;

class ImageObjectCollection
{
    public function __construct(public int $width, public int $height, public Collection $objects){}

    public static function fromJson(string $json): self
    {
        $data = json_decode($json);
        
        return new ImageObjectCollection(
            $data->width,
            $data->height,
            collect($data->predictions)
                ->map(fn ($object) => new ImageObject($object->class, $object->score, $object->bbox))
        );
    }
}
