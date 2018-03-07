<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kota
 * @package App\Models
 * @version February 27, 2018, 6:21 pm UTC
 */
class Kota extends Model
{
    use SoftDeletes;

    public $table = 'kotas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_provinsi',
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id_provinsi' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'id_provinsi' => 'required',
        'nama' => 'required'
    ];

    
}
