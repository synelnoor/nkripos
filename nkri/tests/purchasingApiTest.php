<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class purchasingApiTest extends TestCase
{
    use MakepurchasingTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreatepurchasing()
    {
        $purchasing = $this->fakepurchasingData();
        $this->json('POST', '/api/v1/purchasings', $purchasing);

        $this->assertApiResponse($purchasing);
    }

    /**
     * @test
     */
    public function testReadpurchasing()
    {
        $purchasing = $this->makepurchasing();
        $this->json('GET', '/api/v1/purchasings/'.$purchasing->id);

        $this->assertApiResponse($purchasing->toArray());
    }

    /**
     * @test
     */
    public function testUpdatepurchasing()
    {
        $purchasing = $this->makepurchasing();
        $editedpurchasing = $this->fakepurchasingData();

        $this->json('PUT', '/api/v1/purchasings/'.$purchasing->id, $editedpurchasing);

        $this->assertApiResponse($editedpurchasing);
    }

    /**
     * @test
     */
    public function testDeletepurchasing()
    {
        $purchasing = $this->makepurchasing();
        $this->json('DELETE', '/api/v1/purchasings/'.$purchasing->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/purchasings/'.$purchasing->id);

        $this->assertResponseStatus(404);
    }
}
