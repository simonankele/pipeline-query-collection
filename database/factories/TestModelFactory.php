<?php

declare(strict_types=1);

namespace Baro\PipelineQueryCollection\Database\Factories;

use SimonAnkele\PipelineQueryCollection\Tests\Classes\Models\TestModel;
use Illuminate\Database\Eloquent\Factories\Factory;

class TestModelFactory extends Factory
{
    protected $model = TestModel::class;

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'type_flag' => $this->faker->randomElement([1, 2, 4]),
            'is_visible' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime,
        ];
    }
}
