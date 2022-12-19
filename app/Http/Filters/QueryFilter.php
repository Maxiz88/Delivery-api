<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    /**
     * @var Request
     */
    protected $request;

    /**
     * @var Builder
     */
    protected $builder;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * @param Builder $builder
     */
    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->fields() as $field => $value) {
            $method = $this->camelCase($field);
            if (method_exists($this, $method)) {
                call_user_func_array([$this, $method], (array)$value);
            }
        }
    }

    /**
     * @return array
     */
    protected function fields(): array
    {
        return array_key_exists('filter', $this->request->all()) ?
            $this->request->all()['filter'] :
            $this->request->all();
    }

    /**
     * @param $field
     * @return string
     */
    protected function camelCase($field): string
    {
        $hyphen = strpos($field, '-');
        $underline = strpos($field, '_');
        if($hyphen || $underline) {
            $words = explode($hyphen ? '-' : '_', $field);
            foreach ($words as $key => $word) {
                if($key !== 0) {
                    $word = ucfirst($word);
                    $words[$key] = $word;
                }
            }
            $field = implode('', $words);
        }
        return $field;
    }
}
