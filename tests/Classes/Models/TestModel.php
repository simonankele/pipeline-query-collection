<?php

declare(strict_types=1);

namespace SimonAnkele\PipelineQueryCollection\Tests\Classes\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use SimonAnkele\PipelineQueryCollection\Concerns\Filterable;
use SimonAnkele\PipelineQueryCollection\Concerns\Sortable;
use SimonAnkele\PipelineQueryCollection\Filters\BitwiseFilter;
use SimonAnkele\PipelineQueryCollection\Filters\BooleanFilter;
use SimonAnkele\PipelineQueryCollection\Filters\DateFromFilter;
use SimonAnkele\PipelineQueryCollection\Filters\DateToFilter;
use SimonAnkele\PipelineQueryCollection\Filters\ExactFilter;
use SimonAnkele\PipelineQueryCollection\Filters\RelationFilter;
use SimonAnkele\PipelineQueryCollection\Filters\RelativeFilter;
use SimonAnkele\PipelineQueryCollection\Filters\ScopeFilter;
use SimonAnkele\PipelineQueryCollection\Filters\TrashFilter;
use SimonAnkele\PipelineQueryCollection\Sortings\Sort;

class TestModel extends Model
{
    use Filterable;
    use HasFactory;
    use SoftDeletes;
    use Sortable;

    protected $guarded = [];

    protected function getFilters()
    {
        return [
            BitwiseFilter::make('type_flag'),
            BooleanFilter::make('is_visible'),
            DateFromFilter::make('created_at'),
            DateToFilter::make('created_at'),
            ExactFilter::make('updated_at'),
            RelationFilter::make('belongs_to_related_models', 'id'),
            RelationFilter::make('belongs_to_many_related_models', 'id'),
            RelativeFilter::make('name'),
            ScopeFilter::make('search'),
            TrashFilter::make(),
        ];
    }

    protected function getSorts()
    {
        return [
            Sort::make(),
        ];
    }

    public function belongsToRelatedModels()
    {
        return $this->belongsTo(RelatedModel::class, 'related_model_id');
    }

    public function belongsToManyRelatedModels()
    {
        return $this->belongsToMany(RelatedModel::class, 'pivot_table');
    }

    public function scopeSearch(Builder $query, string $search)
    {
        return $query->where(
            fn (Builder $query) => $query
                ->where('name', 'like', "%{$search}%")
                ->orWhere('id', $search)
        );
    }
}
