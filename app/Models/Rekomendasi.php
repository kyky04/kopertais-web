<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rekomendasi
 * @package App\Models
 * @version April 14, 2018, 11:04 pm UTC
 */
class Rekomendasi extends Model
{
    use SoftDeletes;

    public $table = 'rekomendasis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_user',
        'id_univ',
        'tanggal_berangkat',
        'tanggal_kembali',
        'lama_pejalanan'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_user' => 'integer',
        'id_univ' => 'integer',
        'tanggal_berangkat' => 'string',
        'tanggal_kembali' => 'string',
        'lama_pejalanan' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_user' => 'required',
        'id_univ' => 'required',
        'tanggal_berangkat' => 'required',
        'tanggal_kembali' => 'required',
        'lama_pejalanan' => 'required'
    ];
 public function pegawai()
    {
        return $this->belongsTo(Pegawai::class,'id_user');
    }
     public function universitas()
    {
        return $this->belongsTo(Universitas::class,'id_univ');
    }
    
}
