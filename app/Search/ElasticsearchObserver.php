<?php

namespace App\Search;

use Elasticsearch\Client;
use Elasticsearch\ClientBuilder;

class ElasticsearchObserver
{
    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct()
    {
        $this->elasticsearch = \Elasticsearch\ClientBuilder::create()
            ->setHosts(['http://elasticsearch:9200'])
            ->build();
    }
    public function saved($model)
    {
        $this->elasticsearch->index([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
            'body' => $model->toSearchArray(),
        ]);
    }
    public function deleted($model)
    {
        $this->elasticsearch->delete([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'id' => $model->getKey(),
        ]);
    }
}
