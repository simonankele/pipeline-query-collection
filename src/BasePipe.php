<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection;

use Illuminate\Database\Connection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class BasePipe
{
    protected Request $request;

    protected Builder $query;

    public function __construct()
    {
        $this->request = app(Request::class);
    }

    abstract protected function apply(): static;

    abstract public function handle($query, \Closure $next);

    protected function getDriverName(): string
    {
        /** @var Connection $connection */
        $connection = $this->query->getConnection();

        return $connection->getDriverName();
    }
}
