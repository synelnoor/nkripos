<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Report
 * @package App\Models
 * @version December 26, 2017, 1:36 am UTC
 *
 * @property integer order_id
 * @property integer barang_id
 * @property integer orderdetail_id
 * @property integer pembayaran_id
 */
class Report extends Model
{
    use SoftDeletes;

     public $table = 'reports';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'barang_id',
        'orderdetail_id',
        'pembayaran_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer',
        'barang_id' => 'integer',
        'orderdetail_id' => 'integer',
        'pembayaran_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
