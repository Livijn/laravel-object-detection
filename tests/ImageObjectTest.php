<?php
namespace Livijn\LaravelObjectDetection\Tests;

use Livijn\LaravelObjectDetection\ImageObject;

class ImageObjectTest extends TestCase
{
    /** @test It can create a collection from json */
    public function it_can_create_a_collection_from_json()
    {
        $json = file_get_contents(__DIR__ . '/out.json');
        $obj = ImageObject::fromJson($json);

        $this->assertEquals(0, $obj->labelId);
        $this->assertEquals(0.77107567, $obj->score);
        $this->assertEquals(['x' => 0.3, 'y' => 0.53], $obj->relativeCenter);
    }
}
