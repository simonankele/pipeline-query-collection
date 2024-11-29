<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface CanSortContract
{
    public function scopeSort(Builder $query, ?array $criteria = null): Builder;

    public function sortCriteria(): array;
}
