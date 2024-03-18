<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

class DataTableService
{
    private Builder $query;
    private Collection $items;
    private int $total;
    private int $page;
    private int $perPage;
    private string $orderBy;
    private string $orderDir;

    public function __construct(Request $request, Builder $query)
    {
        $this->query = $query;

        $this->page = $request->get('page', 1);
        $this->perPage = $request->get('per_page', 25);
        $this->orderBy = $request->get('sort_by', 'id');
        $this->orderDir = $request->get('sort_dir', 'asc');
    }

    public function find(): self
    {
        // ToDo Фильтры

        $this->total = $this->query->count();

        $data = $this->query->orderBy($this->orderBy, $this->orderDir)
            ->limit($this->perPage)
            ->offset($this->perPage * ($this->page - 1))
            ->get();

        $this->items = $data;

        return $this;
    }

    public function modifyColumns(array $columns): self
    {
        $this->items->each(function (Model $model) use ($columns) {
            foreach ($columns as $columnName => $handler) {
                if (isset($model->{$columnName})) {
                    $model->{$columnName} = $handler($model->{$columnName});
                }
            }
        });

        return $this;
    }

    public function getData(): array
    {
        return [
            'items' => $this->items,
            'total' => $this->total,
        ];
    }
}
