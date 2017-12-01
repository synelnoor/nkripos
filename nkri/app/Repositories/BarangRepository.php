<?php

namespace App\Repositories;

use App\Models\Barang;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BarangRepository
 * @package App\Repositories
 * @version November 1, 2017, 2:46 pm UTC
 *
 * @method Barang findWithoutFail($id, $columns = ['*'])
 * @method Barang find($id, $columns = ['*'])
 * @method Barang first($columns = ['*'])
*/
class BarangRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_barang',
        'harga_beli',
        'harga_jual',
        'code_barang'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Barang::class;
    }
}
