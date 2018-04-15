<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PerjalananDinas
 * @package App\Models
 * @version April 14, 2018, 11:16 pm UTC
 */
class PerjalananDinas extends Model
{
    use SoftDeletes;

    public $table = 'perjalanan_dinas';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'pangkat',
        'jabatan',
        'maksud_perjalanan',
        'kendaraan',
        'tempat_berangkat',
        'tempat_tujuan',
        'lama_perjalanan',
        'tanggal_keberangkatan',
        'tanggal_kembali',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'nama' => 'string',
        'pangkat' => 'string',
        'jabatan' => 'string',
        'maksud_perjalanan' => 'string',
        'kendaraan' => 'string',
        'tempat_berangkat' => 'string',
        'tempat_tujuan' => 'string',
        'lama_perjalanan' => 'integer',
        'tanggal_keberangkatan' => 'string',
        'tanggal_kembali' => 'string',
        'status' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nama' => 'required',
        'pangkat' => 'required',
        'jabatan' => 'required',
        'maksud_perjalanan' => 'required',
        'kendaraan' => 'required',
        'tempat_berangkat' => 'required',
        'tempat_tujuan' => 'required',
        'lama_perjalanan' => 'required',
        'tanggal_keberangkatan' => 'required',
        'tanggal_kembali' => 'required',
        'status' => 'required'
    ];

    
}
