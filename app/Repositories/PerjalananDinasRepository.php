<?php

namespace App\Repositories;

use App\Models\PerjalananDinas;
use InfyOm\Generator\Common\BaseRepository;

class PerjalananDinasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'pangkat',
        'jabatan',
        'maksud_perjalanan',
        'kendaraan',
        'tempat_berangkat',
        'tempat_tujuan',
        'lama_perjalanan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return PerjalananDinas::class;
    }
}
