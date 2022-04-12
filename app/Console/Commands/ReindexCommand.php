<?php

namespace App\Console\Commands;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;
use Illuminate\Console\Command;

use App\Models\Post;
use App\Models\Product;
use App\Models\Page;
use App\Models\Category;
use App\Models\BlogCategory;

class ReindexCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'search:reindex';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reindex all Models to Elasticsearch';

    /**
     * Create a new command instance.
     *
     * @return void
     */

    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct()
    {
        parent::__construct();
        $this->elasticsearch = \Elasticsearch\ClientBuilder::create()
            ->setHosts(['http://elasticsearch:9200'])
            ->build();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Indexing all posts. This might take a while...');

        $entities = [
            Post::class,
            Product::class,
            Page::class,
            Category::class,
            BlogCategory::class,
        ];
        foreach ($entities as $entity){
            $this->info("\n$entity\n");
            foreach ($entity::cursor() as $entityItem)
            {
                $this->elasticsearch->index([
                    'index' => $entityItem->getSearchIndex(),
                    'type' => $entityItem->getSearchType(),
                    'id' => $entityItem->getKey(),
                    'body' => $entityItem->toSearchArray(),
                ]);
                $this->output->write('.');

            }

        }

        $this->info("\nDone!");
    }
}
