<?php

namespace App\DataTables;

use App\Models\Order;
use Form;
use Yajra\Datatables\Services\DataTable;
use Carbon\Carbon;

class OrderDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.orders.datatables_actions')
            ->editColumn('tanggal', '{{ date(\'d/m/Y\', strtotime($tanggal)) }}')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {           
        $now= Carbon::now();
        $yest= Carbon::yesterday();
        $orders = Order::whereBetween('tanggal', [$yest, $now]);

        return $this->applyScopes($orders);
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
            'nama_customer' => ['name' => 'nama_customer', 'data' => 'nama_customer'],
            'code_order' => ['name' => 'code_order', 'data' => 'code_order'],
            'jumlah_barang' => ['name' => 'jumlah_barang', 'data' => 'jumlah_barang'],
            'total' => ['name' => 'total', 'data' => 'total'],
            'status' => ['name' => 'status', 'data' => 'status'],
            'tanggal' => ['name' => 'tanggal', 'data' => 'tanggal']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'orders';
    }
}
