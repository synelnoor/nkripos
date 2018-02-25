<?php

use Faker\Factory as Faker;
use App\Models\aja;
use App\Repositories\ajaRepository;

trait MakeajaTrait
{
    /**
     * Create fake instance of aja and save it in database
     *
     * @param array $ajaFields
     * @return aja
     */
    public function makeaja($ajaFields = [])
    {
        /** @var ajaRepository $ajaRepo */
        $ajaRepo = App::make(ajaRepository::class);
        $theme = $this->fakeajaData($ajaFields);
        return $ajaRepo->create($theme);
    }

    /**
     * Get fake instance of aja
     *
     * @param array $ajaFields
     * @return aja
     */
    public function fakeaja($ajaFields = [])
    {
        return new aja($this->fakeajaData($ajaFields));
    }

    /**
     * Get fake data of aja
     *
     * @param array $postFields
     * @return array
     */
    public function fakeajaData($ajaFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama' => $fake->word,
            'password' => $fake->word,
            'deskripsi' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $ajaFields);
    }
}
