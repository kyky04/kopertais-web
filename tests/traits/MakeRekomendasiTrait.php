<?php

use Faker\Factory as Faker;
use App\Models\Rekomendasi;
use App\Repositories\RekomendasiRepository;

trait MakeRekomendasiTrait
{
    /**
     * Create fake instance of Rekomendasi and save it in database
     *
     * @param array $rekomendasiFields
     * @return Rekomendasi
     */
    public function makeRekomendasi($rekomendasiFields = [])
    {
        /** @var RekomendasiRepository $rekomendasiRepo */
        $rekomendasiRepo = App::make(RekomendasiRepository::class);
        $theme = $this->fakeRekomendasiData($rekomendasiFields);
        return $rekomendasiRepo->create($theme);
    }

    /**
     * Get fake instance of Rekomendasi
     *
     * @param array $rekomendasiFields
     * @return Rekomendasi
     */
    public function fakeRekomendasi($rekomendasiFields = [])
    {
        return new Rekomendasi($this->fakeRekomendasiData($rekomendasiFields));
    }

    /**
     * Get fake data of Rekomendasi
     *
     * @param array $postFields
     * @return array
     */
    public function fakeRekomendasiData($rekomendasiFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_user' => $fake->randomDigitNotNull,
            'id_univ' => $fake->randomDigitNotNull,
            'tanggal_berangkat' => $fake->word,
            'tanggal_kembali' => $fake->word,
            'lama_pejalanan' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $rekomendasiFields);
    }
}
