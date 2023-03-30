<?php
namespace Livijn\LaravelObjectDetection;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class InstallCommand extends Command
{
    protected $signature = 'object-detection:install';
    protected $description = 'Installs the pip environment';

    public function handle()
    {
        (Process::fromShellCommandline(__DIR__ . "/../scripts/install.sh"))
            ->mustRun();
    }
}
