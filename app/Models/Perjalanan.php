<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Perjalanan
 * @package App\Models
 * @version February 27, 2018, 6:48 pm UTC
 */
class Perjalanan extends Model
{
    use SoftDeletes;

    public $table = 'perjalanans';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_universitas',
        'waktu',
        'status_keuangan',
        'status_bendahara',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_universitas' => 'integer',
        'waktu' => 'date',
        'status_keuangan' => 'integer',
        'status_bendahara' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_universitas' => 'required',
        'waktu' => 'required',
        'status_keuangan' => 'required',
        'status_bendahara' => 'required',
        'nama' => 'required'
    ];

    public function universitas()
    {
        return $this->belongsTo(Universitas::class,'id_universitas');
    }

    
}
