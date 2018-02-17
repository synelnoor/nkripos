<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class purchasing
 * @package App\Models
 * @version February 17, 2018, 8:59 am UTC
 *
 * @property string nama_supplier
 * @property string code_supplier
 * @property integer jumlah_barang
 * @property decimal(11 total
 * @property enum(cash.pending) status
 * @property date tanggal
 */
class purchasing extends Model
{
    use SoftDeletes;

    public $table = 'purchasings';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama_supplier',
        'code_supplier',
        'jumlah_barang',
        'total',
        'status',
        'tanggal'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama_supplier' => 'string',
        'code_supplier' => 'string',
        'jumlah_barang' => 'integer',
        'tanggal' => 'date'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
