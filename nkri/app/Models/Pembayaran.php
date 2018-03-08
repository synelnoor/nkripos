<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pembayaran
 * @package App\Models
 * @version November 28, 2017, 3:10 pm UTC
 *
 * @property integer order_id
 * @property date tanggal
 * @property decimal bayar
 * @property decimal kembalian
 * @property decimal total
 */
class Pembayaran extends Model
{
    use SoftDeletes;

    public $table = 'pembayarans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'tanggal',
        'tipe_pemabayaran',
        'bayar',
        'kembalian',
        'total'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer',
        'tanggal' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'tanggal' => 'required',
        'bayar' => 'required'
    ];

     public function order() {
        return $this->belongsTo('App\Models\Order','order_id','id');
    }

    
}
