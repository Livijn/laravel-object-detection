<?php
namespace Livijn\LaravelObjectDetection\Tests;

use Livijn\LaravelObjectDetection\ImageObject;
use Livijn\LaravelObjectDetection\LaravelObjectDetectionFacade;

class LaravelObjectDetectionTest extends TestCase
{
    /** @test It can get the bounding box for a jpeg image */
    public function it_can_get_the_bounding_box_for_a_jpeg_image()
    {
        $object = LaravelObjectDetectionFacade::getObjectsFromImageUrl('https://images.pexels.com/photos/97082/weimaraner-puppy-dog-snout-97082.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500');

        $this->assertInstanceOf(ImageObject::class, $object);
        $this->assertEquals(0.5281647, $object->score);
    }

    /** @test It can debug the image */
    public function it_can_debug_the_image()
    {
        if (file_exists(__DIR__ . '/../scripts/tmp/out.jpg')) {
            unlink(__DIR__ . '/../scripts/tmp/out.jpg');
        }
        
        $this->assertFileDoesNotExist(__DIR__ . '/../scripts/tmp/out.jpg');

        LaravelObjectDetectionFacade::getObjectsFromImageUrl('https://images.pexels.com/photos/97082/weimaraner-puppy-dog-snout-97082.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500', 1);

        $this->assertFileExists(__DIR__ . '/../scripts/tmp/out.jpg');
    }

    /** @test It throws an exception when wrong format */
    public function it_throws_an_exception_when_wrong_format()
    {
        $this->expectExceptionMessage('Incorrect format used. Supported types: BMP, JPEG, PNG, or GIF.');

        LaravelObjectDetectionFacade::getObjectsFromImageUrl('https://google.com/image.webp');
    }
}
