<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EagleFly extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eagle:fly';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sid\'s Eagle Application Builder.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
