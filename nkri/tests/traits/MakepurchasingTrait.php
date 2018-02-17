<?php

use Faker\Factory as Faker;
use App\Models\purchasing;
use App\Repositories\purchasingRepository;

trait MakepurchasingTrait
{
    /**
     * Create fake instance of purchasing and save it in database
     *
     * @param array $purchasingFields
     * @return purchasing
     */
    public function makepurchasing($purchasingFields = [])
    {
        /** @var purchasingRepository $purchasingRepo */
        $purchasingRepo = App::make(purchasingRepository::class);
        $theme = $this->fakepurchasingData($purchasingFields);
        return $purchasingRepo->create($theme);
    }

    /**
     * Get fake instance of purchasing
     *
     * @param array $purchasingFields
     * @return purchasing
     */
    public function fakepurchasing($purchasingFields = [])
    {
        return new purchasing($this->fakepurchasingData($purchasingFields));
    }

    /**
     * Get fake data of purchasing
     *
     * @param array $postFields
     * @return array
     */
    public function fakepurchasingData($purchasingFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'nama_supplier' => $fake->word,
            'code_supplier' => $fake->word,
            'jumlah_barang' => $fake->randomDigitNotNull,
            'total' => $fake->word,
            'status' => $fake->word,
            'tanggal' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $purchasingFields);
    }
}
