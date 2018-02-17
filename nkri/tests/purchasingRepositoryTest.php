<?php

use App\Models\purchasing;
use App\Repositories\purchasingRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class purchasingRepositoryTest extends TestCase
{
    use MakepurchasingTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var purchasingRepository
     */
    protected $purchasingRepo;

    public function setUp()
    {
        parent::setUp();
        $this->purchasingRepo = App::make(purchasingRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatepurchasing()
    {
        $purchasing = $this->fakepurchasingData();
        $createdpurchasing = $this->purchasingRepo->create($purchasing);
        $createdpurchasing = $createdpurchasing->toArray();
        $this->assertArrayHasKey('id', $createdpurchasing);
        $this->assertNotNull($createdpurchasing['id'], 'Created purchasing must have id specified');
        $this->assertNotNull(purchasing::find($createdpurchasing['id']), 'purchasing with given id must be in DB');
        $this->assertModelData($purchasing, $createdpurchasing);
    }

    /**
     * @test read
     */
    public function testReadpurchasing()
    {
        $purchasing = $this->makepurchasing();
        $dbpurchasing = $this->purchasingRepo->find($purchasing->id);
        $dbpurchasing = $dbpurchasing->toArray();
        $this->assertModelData($purchasing->toArray(), $dbpurchasing);
    }

    /**
     * @test update
     */
    public function testUpdatepurchasing()
    {
        $purchasing = $this->makepurchasing();
        $fakepurchasing = $this->fakepurchasingData();
        $updatedpurchasing = $this->purchasingRepo->update($fakepurchasing, $purchasing->id);
        $this->assertModelData($fakepurchasing, $updatedpurchasing->toArray());
        $dbpurchasing = $this->purchasingRepo->find($purchasing->id);
        $this->assertModelData($fakepurchasing, $dbpurchasing->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletepurchasing()
    {
        $purchasing = $this->makepurchasing();
        $resp = $this->purchasingRepo->delete($purchasing->id);
        $this->assertTrue($resp);
        $this->assertNull(purchasing::find($purchasing->id), 'purchasing should not exist in DB');
    }
}
