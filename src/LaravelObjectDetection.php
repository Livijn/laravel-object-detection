<?php
namespace Livijn\LaravelObjectDetection;

use Symfony\Component\Process\Process;

class LaravelObjectDetection
{
    public function getObjectsFromImageUrl(string $imageUrl, bool $debug = false): ImageObjectCollection
    {
        $this->validateUrl($imageUrl);

        $debug = (int) $debug;
        $path = __DIR__ . "/../scripts/index.js";

        $process = Process::fromShellCommandline("DEBUG_IMAGE={$debug} node $path $imageUrl");

        $process->mustRun();

        $response = $process->getOutput();

        return ImageObjectCollection::fromJson($response);
    }

    private function validateUrl(string $imageUrl): void
    {
        if (! preg_match('/\.(bmp|jpeg|jpg|png|gif)/i', $imageUrl)) {
            throw new \Exception('Incorrect format used. Supported types: BMP, JPEG, PNG, or GIF.');
        }
    }
}
