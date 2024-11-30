<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Database\Factories;

use SimonAnkele\PipelineQueryCollection\Tests\Classes\Models\RelatedModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class RelatedModelFactory extends Factory
{
    protected $model = RelatedModel::class;

    public function definition()
    {
        return [];
    }
}
