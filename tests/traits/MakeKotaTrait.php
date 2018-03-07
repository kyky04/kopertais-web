<?php

use Faker\Factory as Faker;
use App\Models\Kota;
use App\Repositories\KotaRepository;

trait MakeKotaTrait
{
    /**
     * Create fake instance of Kota and save it in database
     *
     * @param array $kotaFields
     * @return Kota
     */
    public function makeKota($kotaFields = [])
    {
        /** @var KotaRepository $kotaRepo */
        $kotaRepo = App::make(KotaRepository::class);
        $theme = $this->fakeKotaData($kotaFields);
        return $kotaRepo->create($theme);
    }

    /**
     * Get fake instance of Kota
     *
     * @param array $kotaFields
     * @return Kota
     */
    public function fakeKota($kotaFields = [])
    {
        return new Kota($this->fakeKotaData($kotaFields));
    }

    /**
     * Get fake data of Kota
     *
     * @param array $postFields
     * @return array
     */
    public function fakeKotaData($kotaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_provinsi' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $kotaFields);
    }
}
