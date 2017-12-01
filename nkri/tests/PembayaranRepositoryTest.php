<?php

use App\Models\Pembayaran;
use App\Repositories\PembayaranRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PembayaranRepositoryTest extends TestCase
{
    use MakePembayaranTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PembayaranRepository
     */
    protected $pembayaranRepo;

    public function setUp()
    {
        parent::setUp();
        $this->pembayaranRepo = App::make(PembayaranRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePembayaran()
    {
        $pembayaran = $this->fakePembayaranData();
        $createdPembayaran = $this->pembayaranRepo->create($pembayaran);
        $createdPembayaran = $createdPembayaran->toArray();
        $this->assertArrayHasKey('id', $createdPembayaran);
        $this->assertNotNull($createdPembayaran['id'], 'Created Pembayaran must have id specified');
        $this->assertNotNull(Pembayaran::find($createdPembayaran['id']), 'Pembayaran with given id must be in DB');
        $this->assertModelData($pembayaran, $createdPembayaran);
    }

    /**
     * @test read
     */
    public function testReadPembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $dbPembayaran = $this->pembayaranRepo->find($pembayaran->id);
        $dbPembayaran = $dbPembayaran->toArray();
        $this->assertModelData($pembayaran->toArray(), $dbPembayaran);
    }

    /**
     * @test update
     */
    public function testUpdatePembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $fakePembayaran = $this->fakePembayaranData();
        $updatedPembayaran = $this->pembayaranRepo->update($fakePembayaran, $pembayaran->id);
        $this->assertModelData($fakePembayaran, $updatedPembayaran->toArray());
        $dbPembayaran = $this->pembayaranRepo->find($pembayaran->id);
        $this->assertModelData($fakePembayaran, $dbPembayaran->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePembayaran()
    {
        $pembayaran = $this->makePembayaran();
        $resp = $this->pembayaranRepo->delete($pembayaran->id);
        $this->assertTrue($resp);
        $this->assertNull(Pembayaran::find($pembayaran->id), 'Pembayaran should not exist in DB');
    }
}
