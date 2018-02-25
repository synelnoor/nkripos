<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ajaApiTest extends TestCase
{
    use MakeajaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateaja()
    {
        $aja = $this->fakeajaData();
        $this->json('POST', '/api/v1/ajas', $aja);

        $this->assertApiResponse($aja);
    }

    /**
     * @test
     */
    public function testReadaja()
    {
        $aja = $this->makeaja();
        $this->json('GET', '/api/v1/ajas/'.$aja->id);

        $this->assertApiResponse($aja->toArray());
    }

    /**
     * @test
     */
    public function testUpdateaja()
    {
        $aja = $this->makeaja();
        $editedaja = $this->fakeajaData();

        $this->json('PUT', '/api/v1/ajas/'.$aja->id, $editedaja);

        $this->assertApiResponse($editedaja);
    }

    /**
     * @test
     */
    public function testDeleteaja()
    {
        $aja = $this->makeaja();
        $this->json('DELETE', '/api/v1/ajas/'.$aja->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/ajas/'.$aja->id);

        $this->assertResponseStatus(404);
    }
}
