<?php
namespace JaguarSoft\LaravelComposer\Console;

use Illuminate\Console\Command;
use Storage;

class ComposerUpdateCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'composer:update {--working-dir=vendor-update}';    

    public function __construct(){
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(){
        $workingDir = $this->option('working-dir');

        $this->comment('Copying composer.json');
        exec("cp composer.json $workingDir/composer.json");

        $this->comment('composer update');
        exec("composer --working-dir=\"$workingDir\" update --no-scripts --no-autoloader --quiet");
        $this->info('composer updated successfully');

        $this->comment('overriding vendor');
        exec("cp -r $workingDir/vendor ./vendor-new");
        exec('rm -r vendor');
        exec('mv vendor-new vendor');
        $this->info('vendor overrided successfully');

        $this->comment('composer dump-autoload --quiet');
        exec('composer dump-autoload');

        $this->comment('composer run post-update-cmd --quiet');
        exec('composer run post-update-cmd');

        $this->info('composer:update process finished successfully');
    }
}