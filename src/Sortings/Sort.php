<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Sortings;

class Sort extends BaseSort
{
    public static function make(): Sort
    {
        return new self;
    }

    protected function apply(): static
    {
        foreach ($this->sort as $field => $direction) {
            $this->query->orderBy($field, $direction);
        }

        return $this;
    }
}
