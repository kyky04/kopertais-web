<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Provinsi
 * @package App\Models
 * @version February 27, 2018, 6:20 pm UTC
 */
class Provinsi extends Model
{
    use SoftDeletes;

    public $table = 'provinsis';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required'
    ];

    
}
