<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Pegawai
 * @package App\Models
 * @version April 14, 2018, 10:52 pm UTC
 */
class Pegawai extends Model
{
    use SoftDeletes;

    public $table = 'pegawais';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'tanggal_lahir'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'tanggal_lahir' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'tanggal_lahir' => 'required'
    ];

    
}
