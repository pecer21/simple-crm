<?php

namespace App\DataTables;

use App\Models\Client;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class ClientsDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $user = auth()->user();

        return datatables()
            ->eloquent($query)
            ->editColumn('edit', function ($model) use ($user) {
                //if ($user->can('edit', $model)) {
                    if (!$model->trashed()) {
                        return view('components.datatables.buttons.edit', [
                            'url'  => route('clients.edit', $model)
                        ]);
                    }
                //}
            })
            ->editColumn('delete', function ($model) use ($user) {
                //if ($user->can('delete', $model)) {
                    if ($model->trashed()) {
                        return view('components.datatables.buttons.restore', [
                            'url'  => route('clients.restore', $model->id)
                        ]);
                    }
                    return view('components.datatables.buttons.destroy', [
                        'url'  => route('clients.destroy', $model)
                    ]);
                //}
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Client $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Client $model)
    {
        $query= $model::query();
        if ($this->request()->has('deleted') && $this->request()->get('deleted') == true) {
            $query->onlyTrashed();
        }
        return $query;
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
                    ->setTableId('clients-table')
                    ->columns($this->getColumns())
                    ->minifiedAjax()
                    ->dom('frtip')
                    ->orderBy(1)
                ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('vat'),
            Column::make('address'),
            Column::computed('edit')->title('')
              ->exportable(false)
              ->printable(false)
              ->width(10)
              ->addClass('text-center'),
            Column::computed('delete')->title('')
              ->exportable(false)
              ->printable(false)
              ->width(10)
              ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Clients_' . date('YmdHis');
    }
}
