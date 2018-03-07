<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class KotaApiTest extends TestCase
{
    use MakeKotaTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateKota()
    {
        $kota = $this->fakeKotaData();
        $this->json('POST', '/api/v1/kotas', $kota);

        $this->assertApiResponse($kota);
    }

    /**
     * @test
     */
    public function testReadKota()
    {
        $kota = $this->makeKota();
        $this->json('GET', '/api/v1/kotas/'.$kota->id);

        $this->assertApiResponse($kota->toArray());
    }

    /**
     * @test
     */
    public function testUpdateKota()
    {
        $kota = $this->makeKota();
        $editedKota = $this->fakeKotaData();

        $this->json('PUT', '/api/v1/kotas/'.$kota->id, $editedKota);

        $this->assertApiResponse($editedKota);
    }

    /**
     * @test
     */
    public function testDeleteKota()
    {
        $kota = $this->makeKota();
        $this->json('DELETE', '/api/v1/kotas/'.$kota->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/kotas/'.$kota->id);

        $this->assertResponseStatus(404);
    }
}
