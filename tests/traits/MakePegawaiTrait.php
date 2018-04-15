<?php

use Faker\Factory as Faker;
use App\Models\Pegawai;
use App\Repositories\PegawaiRepository;

trait MakePegawaiTrait
{
    /**
     * Create fake instance of Pegawai and save it in database
     *
     * @param array $pegawaiFields
     * @return Pegawai
     */
    public function makePegawai($pegawaiFields = [])
    {
        /** @var PegawaiRepository $pegawaiRepo */
        $pegawaiRepo = App::make(PegawaiRepository::class);
        $theme = $this->fakePegawaiData($pegawaiFields);
        return $pegawaiRepo->create($theme);
    }

    /**
     * Get fake instance of Pegawai
     *
     * @param array $pegawaiFields
     * @return Pegawai
     */
    public function fakePegawai($pegawaiFields = [])
    {
        return new Pegawai($this->fakePegawaiData($pegawaiFields));
    }

    /**
     * Get fake data of Pegawai
     *
     * @param array $postFields
     * @return array
     */
    public function fakePegawaiData($pegawaiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'tanggal_lahir' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pegawaiFields);
    }
}
