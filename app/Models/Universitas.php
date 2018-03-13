<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Universitas
 * @package App\Models
 * @version February 27, 2018, 6:24 pm UTC
 */
class Universitas extends Model
{
    use SoftDeletes;

    public $table = 'universitas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_kota',
        'nama',
        'latidude',
        'longitude',
        'jarak',
        'biaya_inap',
        'biaya_konsumsi',
        'alamat'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_kota' => 'integer',
        'nama' => 'string',
        'latidude' => 'double',
        'longitude' => 'double',
        'jarak' => 'integer',
        'biaya_inap' => 'integer',
        'biaya_konsumsi' => 'integer',
        'biaya_konsumsi' => 'alamat'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_kota' => 'required',
        'nama' => 'required',
        'latidude' => 'required',
        'longitude' => 'required',
        'jarak' => 'required',
        'biaya_inap' => 'required',
        'biaya_konsumsi' => 'required',
        'alamat' => 'required'
    ];

    public function kota()
    {
        return $this->belongsTo(Kota::class,'id_kota');
    }

    
}
