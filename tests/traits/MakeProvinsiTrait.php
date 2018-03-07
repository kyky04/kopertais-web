<?php

use Faker\Factory as Faker;
use App\Models\Provinsi;
use App\Repositories\ProvinsiRepository;

trait MakeProvinsiTrait
{
    /**
     * Create fake instance of Provinsi and save it in database
     *
     * @param array $provinsiFields
     * @return Provinsi
     */
    public function makeProvinsi($provinsiFields = [])
    {
        /** @var ProvinsiRepository $provinsiRepo */
        $provinsiRepo = App::make(ProvinsiRepository::class);
        $theme = $this->fakeProvinsiData($provinsiFields);
        return $provinsiRepo->create($theme);
    }

    /**
     * Get fake instance of Provinsi
     *
     * @param array $provinsiFields
     * @return Provinsi
     */
    public function fakeProvinsi($provinsiFields = [])
    {
        return new Provinsi($this->fakeProvinsiData($provinsiFields));
    }

    /**
     * Get fake data of Provinsi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeProvinsiData($provinsiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $provinsiFields);
    }
}
