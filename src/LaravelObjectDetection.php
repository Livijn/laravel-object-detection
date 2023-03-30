<?php
namespace Livijn\LaravelObjectDetection;

use Exception;
use Symfony\Component\Process\Process;

class LaravelObjectDetection
{
    public function getObjectsFromImageUrl(string $imageUrl, bool $debug = false): ImageObject
    {
        $this->validateUrl($imageUrl);

        $debug = (int) $debug;
        $scriptsPath = __DIR__ . "/../scripts";

        (new Process(["python3", "process.py", $imageUrl, $debug], $scriptsPath))->mustRun();

        return ImageObject::fromJson(
            file_get_contents("$scriptsPath/tmp/out.json")
        );
    }

    private function validateUrl(string $imageUrl): void
    {
        if (! preg_match('/\.(bmp|jpeg|jpg|png|gif)/i', $imageUrl)) {
            throw new Exception('Incorrect format used. Supported types: BMP, JPEG, PNG, or GIF.');
        }
    }
}
