<?php

namespace App\DataTables;

use App\Models\purchasing;
use Form;
use Yajra\Datatables\Services\DataTable;

class purchasingDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'purchasings.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $purchasings = purchasing::query();

        return $this->applyScopes($purchasings);
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
            'nama_supplier' => ['name' => 'nama_supplier', 'data' => 'nama_supplier'],
            'code_supplier' => ['name' => 'code_supplier', 'data' => 'code_supplier'],
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
        return 'purchasings';
    }
}
