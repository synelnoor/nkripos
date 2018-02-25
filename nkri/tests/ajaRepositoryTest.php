<?php

use App\Models\aja;
use App\Repositories\ajaRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ajaRepositoryTest extends TestCase
{
    use MakeajaTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var ajaRepository
     */
    protected $ajaRepo;

    public function setUp()
    {
        parent::setUp();
        $this->ajaRepo = App::make(ajaRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateaja()
    {
        $aja = $this->fakeajaData();
        $createdaja = $this->ajaRepo->create($aja);
        $createdaja = $createdaja->toArray();
        $this->assertArrayHasKey('id', $createdaja);
        $this->assertNotNull($createdaja['id'], 'Created aja must have id specified');
        $this->assertNotNull(aja::find($createdaja['id']), 'aja with given id must be in DB');
        $this->assertModelData($aja, $createdaja);
    }

    /**
     * @test read
     */
    public function testReadaja()
    {
        $aja = $this->makeaja();
        $dbaja = $this->ajaRepo->find($aja->id);
        $dbaja = $dbaja->toArray();
        $this->assertModelData($aja->toArray(), $dbaja);
    }

    /**
     * @test update
     */
    public function testUpdateaja()
    {
        $aja = $this->makeaja();
        $fakeaja = $this->fakeajaData();
        $updatedaja = $this->ajaRepo->update($fakeaja, $aja->id);
        $this->assertModelData($fakeaja, $updatedaja->toArray());
        $dbaja = $this->ajaRepo->find($aja->id);
        $this->assertModelData($fakeaja, $dbaja->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteaja()
    {
        $aja = $this->makeaja();
        $resp = $this->ajaRepo->delete($aja->id);
        $this->assertTrue($resp);
        $this->assertNull(aja::find($aja->id), 'aja should not exist in DB');
    }
}
