<?php
namespace Livijn\LaravelObjectDetection;

use Symfony\Component\Process\Process;

class LaravelObjectDetection
{
    public function getObjectsFromImageUrl(string $imageUrl): ImageObjectCollection
    {
        $this->validateUrl($imageUrl);

        $process = new Process(['node', 'scripts/index.js', $imageUrl]);

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
