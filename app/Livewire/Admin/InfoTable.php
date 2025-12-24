<?php

namespace App\Livewire\Admin;

use App\Models\Info; 
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Builder;
use PowerComponents\LivewirePowerGrid\Button;
use PowerComponents\LivewirePowerGrid\Column;
use PowerComponents\LivewirePowerGrid\PowerGridComponent;

final class InfoTable extends PowerGridComponent
{
    /* KUNCI PERBAIKAN: 
       PowerGrid wajib punya nama unik dan tidak boleh bernama "default".
    */
    public string $tableName = 'auto-refresh-table'; 

    public function setUp(): array
    {
        return [
            \PowerComponents\LivewirePowerGrid\Facades\PowerGrid::header()
                ->showSearchInput(),
            \PowerComponents\LivewirePowerGrid\Facades\PowerGrid::footer()
                ->showPerPage()
                ->showRecordCount(),
        ];
    }

    public function datasource(): Builder
    {
        return Info::query();
    }

    public function addColumns() 
    {
        return \PowerComponents\LivewirePowerGrid\Facades\PowerGrid::columns()
            ->addColumn('id')
            ->addColumn('title')
            ->addColumn('author')
            ->addColumn('published_at_formatted', fn ($model) => Carbon::parse($model->published_at)->format('d M Y'))
            ->addColumn('status');
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id')->searchable()->sortable(),
            Column::make('JUDUL', 'title')->searchable()->sortable(),
            Column::make('PENULIS', 'author')->searchable(),
            Column::make('TANGGAL', 'published_at_formatted', 'published_at')->sortable(),
            Column::make('STATUS', 'status'),
            Column::action('AKSI')
        ];
    }

    public function actions($row): array
    {
        return [
            Button::add('edit')
                ->slot('Edit')
                ->id()
                ->class('bg-blue-500 text-white px-3 py-1 rounded text-xs transition-all hover:bg-blue-600')
                ->route('admin.info.edit', ['info' => $row->id]),
        ];
    }
}