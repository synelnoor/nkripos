<?php

namespace App\Repositories;

use App\Models\Pembayaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PembayaranRepository
 * @package App\Repositories
 * @version November 28, 2017, 3:10 pm UTC
 *
 * @method Pembayaran findWithoutFail($id, $columns = ['*'])
 * @method Pembayaran find($id, $columns = ['*'])
 * @method Pembayaran first($columns = ['*'])
*/
class PembayaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'tanggal',
        'bayar',
        'kembalian',
        'total'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pembayaran::class;
    }
}
