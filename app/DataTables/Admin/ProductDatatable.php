<?php

namespace App\DataTables\Admin;

use App\Model\Product;
use Yajra\DataTables\Services\DataTable;

class ProductDatatable extends DataTable
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
            ->addColumn('show', 'admin.products.btn.show')
            ->addColumn('action', 'admin.products.btn.action')
            ->rawColumns([
                'action',
                'show',
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
        return Product::query()->with('category')->select('products.*')->latest();
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
                'name' => 'show',
                'data' => 'show',
                'title' => 'عرض المنتج',
                'exportable' => false,
                'printable' => false,
                'orderable' => false,
                'searchable' => false,
            ], [
                'name' => 'id',
                'data' => 'id',
                'title' => 'ID',
            ], [
                'name' => 'name',
                'data' => 'name',
                'title' => 'اسم المنتج',
            ], [
                'name' => 'price',
                'data' => 'price',
                'title' => 'السعر',
            ], [
                'name' => 'qty',
                'data' => 'qty',
                'title' => 'الكميه',
            ], [
                'name' => 'category.name_ar',
                'data' => 'category.name_ar',
                'title' => 'اسم القسم',
            ], [
                'name' => 'offer',
                'data' => 'offer',
                'title' => 'العرض',
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
        return 'Place_' . date('YmdHis');
    }
}

