<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Tests\Classes\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelatedModel extends Model
{
    use HasFactory;

    protected $guarded = [];
}
