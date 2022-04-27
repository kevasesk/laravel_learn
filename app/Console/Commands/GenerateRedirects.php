<?php

namespace App\Console\Commands;

use App\Models\Page;
use App\Models\Redirect;
use Illuminate\Console\Command;

class GenerateRedirects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'redirects:generate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Regenerates url redirects for entities with dynamic urls';

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
        $entitiesToProcess = [
            Redirect::TYPE_PAGE => \App\Models\Page::class,
            Redirect::TYPE_PRODUCT => \App\Models\Product::class,
            Redirect::TYPE_CATEGORY => \App\Models\Category::class,
            Redirect::TYPE_BLOG_POST => \App\Models\Post::class,
        ];
        foreach ($entitiesToProcess as $type => $model){
            $this->info("\n" . $model);
            $this->process($type, $model);
        }

        $this->info("\nDone!");
    }
    public function process($type, $model)
    {
        $existRedirects = Redirect::query()
            ->select('entity_id')
            ->where('type','=', $type)
            ->get()
            ->toArray();
        $existRedirects = array_column($existRedirects, 'entity_id');
        $entities = $model::all();

        foreach ($entities as $entity){
            if(!in_array($entity->id, $existRedirects)){
                $new = new Redirect();
                $new->entity_id = $entity->id;
                $new->type = $type;
                $new->url = \Illuminate\Support\Str::slug($entity->title, '-');
                $new->save();
                $this->output->write('.');
            }
        }
    }
}
