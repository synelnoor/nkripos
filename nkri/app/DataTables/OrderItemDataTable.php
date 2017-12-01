<?php

namespace App\DataTables;

use App\Models\OrderItem;
use Form;
use Yajra\Datatables\Services\DataTable;

class OrderItemDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.orders.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $orderItems = OrderItem::query();

        return $this->applyScopes($orderItems);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'order_id' => ['name' => 'order_id', 'data' => 'order_id'],
             'barang_id' => ['name' => 'barang_id', 'data' => 'barang_id'],
            'code_barang' => ['name' => 'code_barang', 'data' => 'code_barang'],
            'nama_barang' => ['name' => 'nama_barang', 'data' => 'nama_barang'],
            'qty' => ['name' => 'qty', 'data' => 'qty'],
            'harga' => ['name' => 'harga', 'data' => 'harga'],
            'jumlah' => ['name' => 'jumlah', 'data' => 'jumlah']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orderItems';
    }
}
