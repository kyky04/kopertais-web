<?php

namespace App\Repositories;

use App\Models\Provinsi;
use InfyOm\Generator\Common\BaseRepository;

class ProvinsiRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Provinsi::class;
    }
}
