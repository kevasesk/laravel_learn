<?php

namespace App\Search;

trait Searchable
{
    public static function bootSearchable()
    {
        static::observe(ElasticsearchObserver::class);
    }
    public function getSearchIndex()
    {
        return $this->getTable();
    }
    public function getSearchType()
    {
        if (property_exists($this, 'useSearchType')) {
            return $this->useSearchType;
        }
        return $this->getTable();
    }
    public function toSearchArray()
    {
        $attributes = $this->toArray();
        //Fix date formats for elastic
        $dateAttributes = [
            'sale_price_from',
            'sale_price_to',
        ];
        foreach ($dateAttributes as $dateAttribute){
            if(isset($attributes[$dateAttribute]) && $attributes[$dateAttribute]){
                $old = \DateTime::createFromFormat('Y-m-d H:i:s', $attributes[$dateAttribute]);
                if($old){
                    $attributes[$dateAttribute] = $old->format('Y-m-d\TH:i:s.u\Z');
                }

            }
        }
        return $attributes;
    }

}
