<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class DebugCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'debug:exec';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Go to FTP and read data';

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
     * @return int
     */
    public function handle()
    {
        #\App\Jobs\TestPodcast::dispatch();
        #\Illuminate\Support\Facades\Mail::to('testsender@gmail.com')->send(new \App\Mail\Test());
        #\App\Models\Product::factory()->count(1)->create();
        $searchModel = new \App\Search\ElasticsearchRepository();
        $results = $searchModel->filterProducts('brand', 'Apple');
        dd(count($results));


        return 0;
    }
}
