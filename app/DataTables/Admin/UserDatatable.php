<?php

namespace App\DataTables\Admin;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Html\Editor\Editor;

class UserDatatable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('created_at', function ($contact){
                return date('d/m/Y H:i:s', strtotime($contact->created_at) );
            })
            ->addColumn('action', 'admin.users.btn.action')
            ->rawColumns([
                'action',
            ]);
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\AdminDatatable $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        return User::query()->select('users.*')->latest();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->parameters([
                'dom' => 'Blfrtip',
                'lengthMenu' => [[20, 50, 100, 200], [20, 50, 100, trans('datatable.show_all')]],
                'buttons' => [],

                'initComplete' => " function () {
                            this.api().columns([0,1,2,3]).every(function() {
                                    var column = this;
                                    var input = document.createElement(\"input\");
                                    $(input).appendTo($(column.footer()).empty())
                                    .on('keyup', function() {
                                            column.search($(this).val(), false, false, true).draw();
                                        });
                                    });
                            }",
                'language' => datatable_lang(),
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            [
                'name' => 'id',
                'data' => 'id',
                'title' => 'ID',
            ], [
                'name' => 'name',
                'data' => 'name',
                'title' => trans('datatable.name'),
            ],[
                'name' => 'mobile',
                'data' => 'mobile',
                'title' => trans('datatable.mobile'),
            ],[
                'name' => 'email',
                'data' => 'email',
                'title' => trans('datatable.email'),
            ], [
                'name' => 'created_at',
                'data' => 'created_at',
                'title' => trans('datatable.created_at'),
            ], [
                'name' => 'action',
                'data' => 'action',
                'title' => trans('datatable.action'),
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,

            ],
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}

