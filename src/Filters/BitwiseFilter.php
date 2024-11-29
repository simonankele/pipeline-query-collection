<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Filters;

class BitwiseFilter extends BaseFilter
{
    public function __construct($field)
    {
        parent::__construct();
        $this->field = $field;
    }

    public static function make($field): BitwiseFilter
    {
        return new self($field);
    }

    protected function apply(): static
    {
        $flag = null;
        foreach ($this->getSearchValue() as $value) {
            $flag ??= intval($value);
            $flag = intval($flag) | intval($value);
        }
        if ($flag === null) {
            return $this;
        }
        $this->query->whereRaw("{$this->getSearchColumn()} & ? = ?", [$flag, $flag]);

        return $this;
    }
}
