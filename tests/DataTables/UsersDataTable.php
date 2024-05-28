<?php

namespace mrugeshtatvasoft\DataTables\Buttons\Tests\DataTables;

use Illuminate\Database\Eloquent\Builder;
use mrugeshtatvasoft\DataTables\Buttons\Tests\Models\User;
use mrugeshtatvasoft\DataTables\EloquentDataTable;
use mrugeshtatvasoft\DataTables\Html\Column;
use mrugeshtatvasoft\DataTables\Services\DataTable;

class UsersDataTable extends DataTable
{
    public function dataTable(Builder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->setRowId('id');
    }

    public function query(User $user): Builder
    {
        return $user->newQuery()->select('*');
    }

    public function html(): \mrugeshtatvasoft\DataTables\Html\Builder
    {
        return $this->builder()
            ->setTableId('users-table')
            ->minifiedAjax()
            ->columns([
                Column::make('id'),
                Column::make('name'),
            ]);
    }

    protected function filename(): string
    {
        return 'Users';
    }
}
