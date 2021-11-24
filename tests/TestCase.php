<?php
namespace Livijn\LaravelObjectDetection\Tests;

use Livijn\LaravelObjectDetection\LaravelObjectDetectionServiceProvider;
use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    protected function getPackageProviders($app)
    {
        return [
            LaravelObjectDetectionServiceProvider::class,
        ];
    }
}
