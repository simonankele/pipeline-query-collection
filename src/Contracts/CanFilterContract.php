<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Contracts;

use Illuminate\Database\Eloquent\Builder;

interface CanFilterContract
{
    public function scopeFilter(Builder $query, ?array $criteria = null): Builder;

    public function filterCriteria(): array;
}
