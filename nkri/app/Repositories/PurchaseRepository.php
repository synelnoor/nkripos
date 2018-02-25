<?php

namespace App\Repositories;

use App\Models\Purchase;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PurchaseRepository
 * @package App\Repositories
 * @version February 17, 2018, 9:03 am UTC
 *
 * @method Purchase findWithoutFail($id, $columns = ['*'])
 * @method Purchase find($id, $columns = ['*'])
 * @method Purchase first($columns = ['*'])
*/
class PurchaseRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_supplier',
        'code_supplier',
        'jumlah_barang',
        'total',
        'deskripsi',
        'status',
        'tanggal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Purchase::class;
    }
}
