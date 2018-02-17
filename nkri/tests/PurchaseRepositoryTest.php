<?php

use App\Models\Purchase;
use App\Repositories\PurchaseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseRepositoryTest extends TestCase
{
    use MakePurchaseTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var PurchaseRepository
     */
    protected $purchaseRepo;

    public function setUp()
    {
        parent::setUp();
        $this->purchaseRepo = App::make(PurchaseRepository::class);
    }

    /**
     * @test create
     */
    public function testCreatePurchase()
    {
        $purchase = $this->fakePurchaseData();
        $createdPurchase = $this->purchaseRepo->create($purchase);
        $createdPurchase = $createdPurchase->toArray();
        $this->assertArrayHasKey('id', $createdPurchase);
        $this->assertNotNull($createdPurchase['id'], 'Created Purchase must have id specified');
        $this->assertNotNull(Purchase::find($createdPurchase['id']), 'Purchase with given id must be in DB');
        $this->assertModelData($purchase, $createdPurchase);
    }

    /**
     * @test read
     */
    public function testReadPurchase()
    {
        $purchase = $this->makePurchase();
        $dbPurchase = $this->purchaseRepo->find($purchase->id);
        $dbPurchase = $dbPurchase->toArray();
        $this->assertModelData($purchase->toArray(), $dbPurchase);
    }

    /**
     * @test update
     */
    public function testUpdatePurchase()
    {
        $purchase = $this->makePurchase();
        $fakePurchase = $this->fakePurchaseData();
        $updatedPurchase = $this->purchaseRepo->update($fakePurchase, $purchase->id);
        $this->assertModelData($fakePurchase, $updatedPurchase->toArray());
        $dbPurchase = $this->purchaseRepo->find($purchase->id);
        $this->assertModelData($fakePurchase, $dbPurchase->toArray());
    }

    /**
     * @test delete
     */
    public function testDeletePurchase()
    {
        $purchase = $this->makePurchase();
        $resp = $this->purchaseRepo->delete($purchase->id);
        $this->assertTrue($resp);
        $this->assertNull(Purchase::find($purchase->id), 'Purchase should not exist in DB');
    }
}
