<?php

use Faker\Factory as Faker;
use App\Models\Universitas;
use App\Repositories\UniversitasRepository;

trait MakeUniversitasTrait
{
    /**
     * Create fake instance of Universitas and save it in database
     *
     * @param array $universitasFields
     * @return Universitas
     */
    public function makeUniversitas($universitasFields = [])
    {
        /** @var UniversitasRepository $universitasRepo */
        $universitasRepo = App::make(UniversitasRepository::class);
        $theme = $this->fakeUniversitasData($universitasFields);
        return $universitasRepo->create($theme);
    }

    /**
     * Get fake instance of Universitas
     *
     * @param array $universitasFields
     * @return Universitas
     */
    public function fakeUniversitas($universitasFields = [])
    {
        return new Universitas($this->fakeUniversitasData($universitasFields));
    }

    /**
     * Get fake data of Universitas
     *
     * @param array $postFields
     * @return array
     */
    public function fakeUniversitasData($universitasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_kota' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'latidude' => $fake->word,
            'longitude' => $fake->word,
            'jarak' => $fake->randomDigitNotNull,
            'biaya_inap' => $fake->randomDigitNotNull,
            'biaya_konsumsi' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $universitasFields);
    }
}
