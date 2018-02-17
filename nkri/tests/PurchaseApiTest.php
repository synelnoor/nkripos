<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class PurchaseApiTest extends TestCase
{
    use MakePurchaseTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatePurchase()
    {
        $purchase = $this->fakePurchaseData();
        $this->json('POST', '/api/v1/purchases', $purchase);

        $this->assertApiResponse($purchase);
    }

    /**
     * @test
     */
    public function testReadPurchase()
    {
        $purchase = $this->makePurchase();
        $this->json('GET', '/api/v1/purchases/'.$purchase->id);

        $this->assertApiResponse($purchase->toArray());
    }

    /**
     * @test
     */
    public function testUpdatePurchase()
    {
        $purchase = $this->makePurchase();
        $editedPurchase = $this->fakePurchaseData();

        $this->json('PUT', '/api/v1/purchases/'.$purchase->id, $editedPurchase);

        $this->assertApiResponse($editedPurchase);
    }

    /**
     * @test
     */
    public function testDeletePurchase()
    {
        $purchase = $this->makePurchase();
        $this->json('DELETE', '/api/v1/purchases/'.$purchase->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/purchases/'.$purchase->id);

        $this->assertResponseStatus(404);
    }
}
