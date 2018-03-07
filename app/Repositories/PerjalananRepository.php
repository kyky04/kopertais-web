<?php

namespace App\Repositories;

use App\Models\Perjalanan;
use InfyOm\Generator\Common\BaseRepository;

class PerjalananRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_universitas',
        'waktu',
        'status_keuangan',
        'status_bendahara',
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Perjalanan::class;
    }
}
