<?php

use Faker\Factory as Faker;
use App\Models\PerjalananDinas;
use App\Repositories\PerjalananDinasRepository;

trait MakePerjalananDinasTrait
{
    /**
     * Create fake instance of PerjalananDinas and save it in database
     *
     * @param array $perjalananDinasFields
     * @return PerjalananDinas
     */
    public function makePerjalananDinas($perjalananDinasFields = [])
    {
        /** @var PerjalananDinasRepository $perjalananDinasRepo */
        $perjalananDinasRepo = App::make(PerjalananDinasRepository::class);
        $theme = $this->fakePerjalananDinasData($perjalananDinasFields);
        return $perjalananDinasRepo->create($theme);
    }

    /**
     * Get fake instance of PerjalananDinas
     *
     * @param array $perjalananDinasFields
     * @return PerjalananDinas
     */
    public function fakePerjalananDinas($perjalananDinasFields = [])
    {
        return new PerjalananDinas($this->fakePerjalananDinasData($perjalananDinasFields));
    }

    /**
     * Get fake data of PerjalananDinas
     *
     * @param array $postFields
     * @return array
     */
    public function fakePerjalananDinasData($perjalananDinasFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'pangkat' => $fake->word,
            'jabatan' => $fake->word,
            'maksud_perjalanan' => $fake->word,
            'kendaraan' => $fake->word,
            'tempat_berangkat' => $fake->word,
            'tempat_tujuan' => $fake->word,
            'lama_perjalanan' => $fake->randomDigitNotNull,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $perjalananDinasFields);
    }
}
