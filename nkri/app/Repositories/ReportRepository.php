<?php

namespace App\Repositories;

use App\Models\Report;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ReportRepository
 * @package App\Repositories
 * @version December 26, 2017, 1:39 am UTC
 *
 * @method Report findWithoutFail($id, $columns = ['*'])
 * @method Report find($id, $columns = ['*'])
 * @method Report first($columns = ['*'])
*/
class ReportRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'order_id',
        'barang_id',
        'orderdetail_id',
        'pembayaran_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Report::class;
    }
}
