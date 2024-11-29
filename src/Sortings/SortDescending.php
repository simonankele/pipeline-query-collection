<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Sortings;

class SortDescending extends BaseSort
{
    public static function make()
    {
        return new self;
    }

    protected function apply(): static
    {
        foreach ($this->sort as $field) {
            $this->query->orderBy($field, 'desc');
        }

        return $this;
    }
}
