<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use MeiliSearch\Client;
use Laravel\Scout\Searchable;

class SetupMeilisearch extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'meilisearch:setup {models*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setup configs need to use meilisearch in laravel-scout.';

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
        $models = $this->argument('models');

        foreach ($models as $model) {
            $this->syncFilterableAttributes($model);
        }
    }

    /**
     * From version 2.1 default filterable attributes is empty
     * => Need to setup it to we have ability use filter feature
     * More: https://docs.meilisearch.com/reference/api/filterable_attributes.html
     */
    public function syncFilterableAttributes($modelName): void
    {
        $model = new $modelName;
        $url = config('scout.meilisearch.host');
        $hit = new Client($url);
        $hit->index($model->searchableAs())->updateFilterableAttributes((array)$model->meilisearchFilterable);
        $this->info("$modelName was sync filterable attributes.");
    }
}
