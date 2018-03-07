<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProvinsiApiTest extends TestCase
{
    use MakeProvinsiTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateProvinsi()
    {
        $provinsi = $this->fakeProvinsiData();
        $this->json('POST', '/api/v1/provinsis', $provinsi);

        $this->assertApiResponse($provinsi);
    }

    /**
     * @test
     */
    public function testReadProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $this->json('GET', '/api/v1/provinsis/'.$provinsi->id);

        $this->assertApiResponse($provinsi->toArray());
    }

    /**
     * @test
     */
    public function testUpdateProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $editedProvinsi = $this->fakeProvinsiData();

        $this->json('PUT', '/api/v1/provinsis/'.$provinsi->id, $editedProvinsi);

        $this->assertApiResponse($editedProvinsi);
    }

    /**
     * @test
     */
    public function testDeleteProvinsi()
    {
        $provinsi = $this->makeProvinsi();
        $this->json('DELETE', '/api/v1/provinsis/'.$provinsi->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/provinsis/'.$provinsi->id);

        $this->assertResponseStatus(404);
    }
}
