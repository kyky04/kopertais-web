<?php

namespace App\Repositories;

use App\Models\Rekomendasi;
use InfyOm\Generator\Common\BaseRepository;

class RekomendasiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_user',
        'id_univ',
        'tanggal_berangkat',
        'tanggal_kembali',
        'lama_pejalanan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rekomendasi::class;
    }
}
