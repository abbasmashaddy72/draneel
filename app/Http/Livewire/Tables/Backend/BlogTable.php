<?php

namespace App\Http\Livewire\Tables\Backend;

use App\Models\Blog;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;

class BlogTable extends LivewireDatatable
{
    public $model = Blog::class;
    public $exportable = true;

    public function builder()
    {
        return Blog::query()->join('teams', 'blogs.team_id', '=', 'teams.id')->join('departments', 'blogs.department_id', '=', 'departments.id');
    }

    public function columns()
    {
        return [
            Column::checkbox()
                ->label('Checkbox'),

            NumberColumn::name('id')
                ->label('ID')
                ->defaultSort('desc')
                ->filterable(),

            Column::name('title')
                ->searchable()
                ->filterable()
                ->label('Title'),

            Column::name('department.name')
                ->filterable()
                ->label('Department Name'),

            Column::name('team.name')
                ->filterable()
                ->label('Team Name'),

            NumberColumn::name('clicks')
                ->label('Views')
                ->filterable(),

            Column::name('excerpt')
                ->searchable()
                ->truncate(20)
                ->label('Excerpt'),

            DateColumn::name('created_at')
                ->filterable(),

            Column::callback(['id'], function ($id) {
                return view('pages.backend.blogs.actions', ['id' => $id]);
            })->excludeFromExport()->unsortable()->label('Action'),
        ];
    }
}
