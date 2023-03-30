<?php
namespace Livijn\LaravelObjectDetection;

class ImageObject
{
    public function __construct(public int $labelId, public float $score, public array $relativeCenter) {}

    public static function fromJson(string $json): self
    {
        $obj = json_decode($json);
        
        $x = $obj->locationData->relativeBoundingBox->xmin + $obj->locationData->relativeBoundingBox->width / 2;
        $y = $obj->locationData->relativeBoundingBox->ymin + $obj->locationData->relativeBoundingBox->height / 2;
        
        return new self(
            $obj->labelId[0],
            $obj->score[0],
            [
                'x' => round($x, 2),
                'y' => round($y, 2),
            ],
        );
    }
}
