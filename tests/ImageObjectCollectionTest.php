<?php
namespace Livijn\LaravelObjectDetection\Tests;

use Livijn\LaravelObjectDetection\ImageObject;
use Livijn\LaravelObjectDetection\ImageObjectCollection;

class ImageObjectCollectionTest extends TestCase
{
    /** @test It can create a collection from json */
    public function it_can_create_a_collection_from_json()
    {
        $json = file_get_contents(__DIR__ . '/out.json');
        $collection = ImageObjectCollection::fromJson($json);

        $this->assertEquals(533, $collection->width);
        $this->assertEquals(1000, $collection->height);
        $this->assertEquals(2, $collection->objects->count());
        $this->assertInstanceOf(ImageObject::class, $collection->objects->first());
        $this->assertEquals("dog", $collection->objects->first()->class);
        $this->assertEquals(0.852799654006958, $collection->objects->first()->score);
        $this->assertEquals([
            13.279652535915375,
            22.423863410949707,
            489.92353081703186,
            965.827465057373
        ], $collection->objects->first()->boundingBox);
    }
}
