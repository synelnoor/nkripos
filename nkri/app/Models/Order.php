<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Order
 * @package App\Models
 * @version November 3, 2017, 3:48 pm UTC
 *
 * @property string nama_customer
 * @property string code_order
 * @property integer jumlah_barang
 * @property decimal total
 * @property enum status
 * @property date tanggal
 */
class Order extends Model
{
    use SoftDeletes;

    public $table = 'orders';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_customer',
        'code_order',
        'jumlah_barang',
        'total',
        'total_laba',
        'status',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_customer' => 'string',
        'code_order' => 'string',
        'jumlah_barang' => 'integer',
        'status' => 'string',
        'tanggal' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama_customer' => 'required',
        'code_order' => 'required',
        'jumlah_barang' => 'numeric',
        'total' => 'numeric',
        'status' => '',
        'tanggal' => 'required'
    ];

     public function OrderItem() {
        return $this->hasMany('App\Models\OrderItem');
    }
    public function Pembayaran(){
        return $this->belongsTo('App\Models\Pembayaran','id','order_id');
    }
}
