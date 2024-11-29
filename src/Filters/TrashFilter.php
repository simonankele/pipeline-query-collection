<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Filters;

use SimonAnkele\PipelineQueryCollection\Enums\TrashOptionEnum;

class TrashFilter extends BaseFilter
{
    public function __construct($field = 'trashed')
    {
        parent::__construct();
        $this->field = $field;
    }

    public static function make($field = 'trashed'): TrashFilter
    {
        return new self($field);
    }

    protected function apply(): static
    {
        $option = TrashOptionEnum::tryFrom($this->getSearchValue()[0]);
        match ($option) {
            TrashOptionEnum::ONLY => $this->query->onlyTrashed(), // @phpstan-ignore-line
            TrashOptionEnum::WITH => $this->query->withTrashed(), // @phpstan-ignore-line
            default => $this->query,
        };

        return $this;
    }
}
