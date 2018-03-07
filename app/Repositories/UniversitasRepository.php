<?php

namespace App\Repositories;

use App\Models\Universitas;
use InfyOm\Generator\Common\BaseRepository;

class UniversitasRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
     * Configure the Model
     **/
    public function model()
    {
        return Universitas::class;
    }
}
