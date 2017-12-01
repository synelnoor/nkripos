<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PembayaranApiTest extends TestCase
{
    use MakePembayaranTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePembayaran()
    {
        $pembayaran = $this->fakePembayaranData();
        $this->json('POST', '/api/v1/pembayarans', $pembayaran);

        $this->assertApiResponse($pembayaran);
    }

    /**
     * @test
     */
    public function testReadPembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $this->json('GET', '/api/v1/pembayarans/'.$pembayaran->id);

        $this->assertApiResponse($pembayaran->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $editedPembayaran = $this->fakePembayaranData();

        $this->json('PUT', '/api/v1/pembayarans/'.$pembayaran->id, $editedPembayaran);

        $this->assertApiResponse($editedPembayaran);
    }

    /**
     * @test
     */
    public function testDeletePembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $this->json('DELETE', '/api/v1/pembayarans/'.$pembayaran->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/pembayarans/'.$pembayaran->id);

        $this->assertResponseStatus(404);
    }
}
