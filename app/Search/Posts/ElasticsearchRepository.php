<?php

namespace App\Search\Posts;

use Elasticsearch\Client;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Collection;

use App\Models\Post;
use App\Models\Product;
use App\Models\Page;
use App\Models\Category;
use App\Models\BlogCategory;

class ElasticsearchRepository implements \App\Search\SearchRepository
{
    /** @var \Elasticsearch\Client */
    private $elasticsearch;

    public function __construct()
    {
        $this->elasticsearch = \Elasticsearch\ClientBuilder::create()
            ->setHosts(['http://elasticsearch:9200'])
            ->build();
    }
    public function search(string $query = '')
    {
        $entities = [
            Post::class => 'post',
            Product::class => 'product',
            Page::class => 'page',
            Category::class => 'category',
            BlogCategory::class => 'blog_category',
        ];
        $results = [];
        foreach ($entities as $entityClass => $type){
            $items = $this->searchOnElasticsearch($query, $entityClass);
            $entityDocs = $this->buildCollection($items, $entityClass);
            $results[$type] = $entityDocs;
        }
        return $results;
    }
    private function searchOnElasticsearch(string $query = '', $entity): array
    {
        $model = new $entity();
        $items = $this->elasticsearch->search([
            'index' => $model->getSearchIndex(),
            'type' => $model->getSearchType(),
            'body' => [
                'query' => [
                    'multi_match' => [
                        'fields' => ['title'],
                        'query' => $query,
                    ],
                ],
            ],
        ]);
        return $items;
    }
    private function buildCollection(array $items, $entity): Collection
    {
        $ids = Arr::pluck($items['hits']['hits'], '_id');
        return $entity::findMany($ids)
            ->sortBy(function ($item) use ($ids) {
                return array_search($item->getKey(), $ids);
            });
    }
}
