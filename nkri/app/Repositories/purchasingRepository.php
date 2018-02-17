<?php

namespace App\Repositories;

use App\Models\purchasing;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class purchasingRepository
 * @package App\Repositories
 * @version February 17, 2018, 8:59 am UTC
 *
 * @method purchasing findWithoutFail($id, $columns = ['*'])
 * @method purchasing find($id, $columns = ['*'])
 * @method purchasing first($columns = ['*'])
*/
class purchasingRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_supplier',
        'code_supplier',
        'jumlah_barang',
        'total',
        'status',
        'tanggal'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return purchasing::class;
    }
}
