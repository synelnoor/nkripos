<?php

namespace App\DataTables;

use App\Models\Pembayaran;
use App\Models\Order;
use Form;
use Yajra\Datatables\Services\DataTable;

class PembayaranDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'admin.pembayarans.datatables_actions')
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
        $pembayarans = Order::query()->where('status','pending');

        return $this->applyScopes($pembayarans);
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
            // 'order_id' => ['name' => 'order_id', 'data' => 'order_id'],
            // 'tanggal' => ['name' => 'tanggal', 'data' => 'tanggal'],
            // 'bayar' => ['name' => 'bayar', 'data' => 'bayar'],
            // 'kembalian' => ['name' => 'kembalian', 'data' => 'kembalian'],
            // 'total' => ['name' => 'total', 'data' => 'total']

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
        return 'pembayarans';
    }
}
