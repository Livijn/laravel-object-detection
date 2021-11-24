<?php
namespace Livijn\LaravelObjectDetection\Tests;

use Livijn\LaravelObjectDetection\ImageObject;
use Livijn\LaravelObjectDetection\ImageObjectCollection;

class ImageObjectCollectionTest extends TestCase
{
    /** @test It can create a collection from json */
    public function it_can_create_a_collection_from_json()
    {
        $json = '[{"bbox":[175.18088772892952,132.95283913612366,488.3606146275997,861.4210784435272],"class":"dog","score":0.9675891995429993}, {"bbox":[175.18088772892952,132.95283913612366,488.3606146275997,861.4210784435272],"class":"dog","score":0.9675891995429993}]';
        $collection = ImageObjectCollection::fromJson($json);

        $this->assertCount(2, $collection);
        $this->assertInstanceOf(ImageObject::class, $collection->first());
        $this->assertEquals("dog", $collection->first()->class);
        $this->assertEquals(0.9675891995429993, $collection->first()->score);
        $this->assertEquals([175.18088772892952,132.95283913612366,488.3606146275997,861.4210784435272], $collection->first()->boundingBox);
    }
}
