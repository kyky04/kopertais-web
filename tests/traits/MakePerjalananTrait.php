<?php

use Faker\Factory as Faker;
use App\Models\Perjalanan;
use App\Repositories\PerjalananRepository;

trait MakePerjalananTrait
{
    /**
     * Create fake instance of Perjalanan and save it in database
     *
     * @param array $perjalananFields
     * @return Perjalanan
     */
    public function makePerjalanan($perjalananFields = [])
    {
        /** @var PerjalananRepository $perjalananRepo */
        $perjalananRepo = App::make(PerjalananRepository::class);
        $theme = $this->fakePerjalananData($perjalananFields);
        return $perjalananRepo->create($theme);
    }

    /**
     * Get fake instance of Perjalanan
     *
     * @param array $perjalananFields
     * @return Perjalanan
     */
    public function fakePerjalanan($perjalananFields = [])
    {
        return new Perjalanan($this->fakePerjalananData($perjalananFields));
    }

    /**
     * Get fake data of Perjalanan
     *
     * @param array $postFields
     * @return array
     */
    public function fakePerjalananData($perjalananFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'id_universitas' => $fake->randomDigitNotNull,
            'waktu' => $fake->word,
            'status_keuangan' => $fake->randomDigitNotNull,
            'status_bendahara' => $fake->randomDigitNotNull,
            'nama' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $perjalananFields);
    }
}
