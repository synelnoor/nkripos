<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OrderItem
 * @package App\Models
 * @version November 3, 2017, 5:14 pm UTC
 *
 * @property integer Order_id
 * @property string code_barang
 * @property string nama_barang
 * @property integer qty
 * @property decimal harga
 * @property decimal jumlah
 */
class OrderItem extends Model
{
    use SoftDeletes;

    public $table = 'order_items';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'order_id',
        'barang_id',
        'code_barang',
        'nama_barang',
        'qty',
        'harga',
        'harga_beli',
        'jumlah',
        'subtotal',
        'laba'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'order_id' => 'integer',
        'barang_id'=>'integer',
        'code_barang' => 'string',
        'nama_barang' => 'string',
        'qty' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'order_id' => 'required',
        'barang_id'=>'required',
        'code_barang' => 'required',
        'nama_barang' => 'required',
        'qty' => 'numeric',
        'harga' => 'required',
        'harga_beli'=>'required',
        'laba'=>'required'
    ];


     public function barang() {
        return $this->belongsTo('App\Models\Barang', 'barang_id', 'id');
    }
     public function order() {
        return $this->belongsTo('App\Models\Order', 'order_id', 'id');
    }
}
