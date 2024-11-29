<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Filters;

use SimonAnkele\PipelineQueryCollection\Enums\WildcardPositionEnum;

class RelativeFilter extends BaseFilter
{
    private $wildcardPosition;

    public function __construct($field, WildcardPositionEnum|string|null $wildcardPosition = null)
    {
        parent::__construct();
        $this->field = $field;
        if (is_null($wildcardPosition)) {
            $wildcardPosition = config('pipeline-query-collection.relative_wildcard_position', WildcardPositionEnum::BOTH);
        }
        if (! $wildcardPosition instanceof WildcardPositionEnum) {
            $wildcardPosition = WildcardPositionEnum::from($wildcardPosition);
        }
        $this->wildcardPosition = $wildcardPosition;
    }

    public static function make($field, WildcardPositionEnum|string|null $wildcardPosition = null): RelativeFilter
    {
        return new self($field, $wildcardPosition);
    }

    protected function apply(): static
    {
        foreach ($this->getSearchValue() as $value) {
            $this->query->where($this->getSearchColumn(), 'like', $this->computeSearchValue($value));
        }

        return $this;
    }

    private function computeSearchValue($value): string
    {
        return match ($this->wildcardPosition) {
            WildcardPositionEnum::RIGHT => "$value%",
            WildcardPositionEnum::LEFT => "%$value",
            default => "%$value%",
        };
    }
}
