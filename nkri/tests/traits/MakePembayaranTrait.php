<?php

use Faker\Factory as Faker;
use App\Models\Pembayaran;
use App\Repositories\PembayaranRepository;

trait MakePembayaranTrait
{
    /**
     * Create fake instance of Pembayaran and save it in database
     *
     * @param array $pembayaranFields
     * @return Pembayaran
     */
    public function makePembayaran($pembayaranFields = [])
    {
        /** @var PembayaranRepository $pembayaranRepo */
        $pembayaranRepo = App::make(PembayaranRepository::class);
        $theme = $this->fakePembayaranData($pembayaranFields);
        return $pembayaranRepo->create($theme);
    }

    /**
     * Get fake instance of Pembayaran
     *
     * @param array $pembayaranFields
     * @return Pembayaran
     */
    public function fakePembayaran($pembayaranFields = [])
    {
        return new Pembayaran($this->fakePembayaranData($pembayaranFields));
    }

    /**
     * Get fake data of Pembayaran
     *
     * @param array $postFields
     * @return array
     */
    public function fakePembayaranData($pembayaranFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'order_id' => $fake->randomDigitNotNull,
            'tanggal' => $fake->word,
            'bayar' => $fake->word,
            'kembalian' => $fake->word,
            'total' => $fake->word,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $pembayaranFields);
    }
}
