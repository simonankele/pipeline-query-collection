<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Tests\Classes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotModel extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function testModels()
    {
        return $this->belongsToMany(TestModel::class, 'pivot_table', 'pivot_model_id', 'test_model_id');
    }
}
